<?php

namespace App\Http\Controllers;

use App\Orden;
use DB;

use Illuminate\Http\Request;

class OrdenController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $ordenes = Orden::latest()->paginate(10);
             
        return view('configuracion.pedidos.index');//, compact('ordenes'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        //$areas=Area::whereStatus(1)->pluck('nombre', 'id');
        return view('configuracion.pedidos.create');//,compact('mesa','areas'));
    }




    private function get_tiempo_servir(){

        $sql_get_tiempo_de_cola = "SELECT SUM(c.tiempo_preparacion) as total FROM colas AS c WHERE c.estado != 'Listo'";

        $rs_total = DB::select($sql_get_tiempo_de_cola)[0]->total;
        
        return $rs_total;

    }


    private function get_tiempo_preparacion($receta_id){


        $sql_total_preparacion_orden = "  SELECT COALESCE(SUM(t.tiempo), 0)  AS total_preparacion
        FROM preparacions AS t 
        WHERE t.id IN ( 
            SELECT  d.tipo_preparacion FROM receta_detalles AS d WHERE	d.receta_id = $receta_id 
            )";
 
         $tiempo_preparacion =  DB::select($sql_total_preparacion_orden)[0]->total_preparacion;

         if($tiempo_preparacion == 0){
            return array("status"=>"400", 
             "message"=>"Error El tiempo de espera del plato es CERO, Insumos erroneos en recetas id= $receta_id",
             "data"=>0);
         }


        $sql_get_insumos_cola = "
        SELECT
        	d.tipo_preparacion_id,
            d.insumo_id,
            d.tipo_preparacion
        FROM receta_detalles AS d
        WHERE d.receta_id IN(
            SELECT
                c.receta_id
            FROM colas AS c WHERE c.estado != 'Listo'
        )";

        $sql_get_receta_orden ="
        SELECT 
            d.tipo_preparacion_id,
            d.insumo_id,
            d.tipo_preparacion
            FROM receta_detalles AS d
            WHERE	d.receta_id = $receta_id";

          
    $rs_insumos_orden =  DB::select($sql_get_receta_orden);
    $rs_insumos_cola =  DB::select($sql_get_insumos_cola);

    $tiempo_menos_por_existencia_en_cola=0;

    //buscar en cola todos los insumos que no este listo
       foreach($rs_insumos_cola as $row){

    // buscar todo lso insumos de la orden machearlos if equal less time
            foreach($rs_insumos_orden as $row_orden){

                if($row_orden->tipo_preparacion_id == $row->tipo_preparacion_id){

                    //buscar el tiempo para hacer ese insumo
                    $sql_tipo_preparacin = "SELECT
                    t.tiempo
                    FROM tipos_de_preparacion AS t
                    WHERE t.tipo_preparacion_id =  $row_orden->tipo_preparacion_id";

                    $rs_tipo_preparacion =  DB::select($sql_get_insumos_cola)[0]->tiempo;
                    
                    $tiempo_menos_por_existencia_en_cola += $rs_tipo_preparacion;
        
                }

            }

         
       }

       if($tiempo_menos_por_existencia_en_cola !=0){
        return array("status"=>"200", 
        "message"=>"Tiempo De Preparacion ".($tiempo_preparacion - $tiempo_menos_por_existencia_en_cola). ", este Tiempo fue resudio ".$tiempo_menos_por_existencia_en_cola,
        "data"=>($tiempo_preparacion - $tiempo_menos_por_existencia_en_cola));
       }

       return array("status"=>"200", 
       "message"=>"Tiempo De Preparacion ".($tiempo_preparacion - $tiempo_menos_por_existencia_en_cola),
       "data"=>($tiempo_preparacion - $tiempo_menos_por_existencia_en_cola));

    }




    private function estadisticas_de_cola($n = 1){

        //CANAL SIMPLE, COLA INFINITA
        
        $sql_landan = "-- lapso de tiempo de llegada de los clientes LANDAN
        SELECT 
        COALESCE( AVG( (TIMESTAMPDIFF(SECOND, (SELECT c2.created_at FROM colas c2 WHERE c2.id < c.id order BY c2.id desc Limit 1), c.created_at)/ 60) ), 0) as minutos_llegada
        FROM colas c ";

        $sql_miu ="-- lapso de tiempos de servicios MIU
        SELECT 
        COALESCE( AVG(	(TIMESTAMPDIFF(SECOND,c.created_at, c.updated_at)/60) ), 0) as minutos_servicio 
        FROM colas as c
        where c.estado = 'Listo' ";

        
        $rs_landa = DB::select($sql_landan);
        $rs_miu = DB::select($sql_miu);
        $minutos_servicio = $rs_miu[0]->minutos_servicio;

        if($minutos_servicio == 0){

            return array("status"=>"200",
            "message"=>"La Cola No Presenta La Informacion necesaria para mostrar estadisticas viables, espera las llegada de los clientes y que se sirvan los servicios",
            "data"=>[]);

        }

        $minutos_llegada = $rs_landa[0]->minutos_llegada;

        // 1 -(Landan/miu) probabilidad de que sean cero
        $probabilidad_de_cliente_cero =round( (1 -($minutos_llegada/$minutos_servicio)) * 100, 2 );

        // (1 -(Landan/miu)) * (Landan/Miu)^n probabilidad de que sean N clientes en cola
        $probabilidad_de_n_cliente =round( ((1 -($minutos_llegada/$minutos_servicio)) * ( pow( ($minutos_llegada/$minutos_servicio) , $n) )) * 100, 2);

        // Landan/(miu * (miu-landan) ) Tiempo Promedio en cola
        $tiempo_en_cola = round( ($minutos_llegada/( ($minutos_servicio * ($minutos_servicio/$minutos_llegada)) )), 2 );

        return array("status"=>"200","message"=>"Calculos Realizados Correctamente",
                "p0"=>$probabilidad_de_cliente_cero."%",
                "pn"=>$probabilidad_de_n_cliente."%",
                "wq"=>$tiempo_en_cola);


    }





    // si no me mandas esos parametros no importa..... se lo que sea que mandes lo modificamos y lo convertimos
    // a esos 2 parametros, por que el procesos funciona con esas 2 entidades
    //$insumos_nuevos, un array que contenga los id de los insumos, por que los que el cliente puede modificar se supone que deben existir y su tipo de preparacion
    //EJEMPLO: arroz con huevo, cambio a jamon debe decir si frito o crudo por ejemplo eso sale en el formulario por que esta en DB Tabla preparaicon
    //$id_insumos_modificados, em parentesis separado por coma los id para no incluirlos en lanew receta y new peoduct, y new detalle
    private function crear_receta($id_receta, $id_insumos_modificados = "(1,2)", $insumos_nuevos = "([id=>0,id_preparacion=>1], [id=>4,id_preparacion=>2)"){

//crear producto
        $sql_get_producto = "SELECT p.*  from productos as p where p.id = (SELECT r.producto_id from recetas as r where r.id = $id_receta limit 1)";
        $rs_producto_original = DB::select($sql_get_producto); 
        if( empty($rs_producto_original) ){
            return array("status"=>"400","message"=>"Error el producto Original no se encontro del plato modificado","data"=>[]);
        } 

        $rs_producto_original = $rs_producto_original[0];

        $sql_crear_producto = "INSERT INTO `productos`(`nombre`, `descripcion`, `precio`, `categoria_id`, `created_at`)
         VALUES ('$rs_producto_original->nombre','$rs_producto_original->descripcion',$rs_producto_original->precio, $rs_producto_original->categoria_id, now());
         SELECT LAST_INSERT_ID() as id;";
        
        $rs_producto_nuevo_id = DB::select($sql_crear_producto)[0]->id; //para recetas tabla
//crear producto






//crear receta
        $sql_receta_original = "SELECT * from recetas where id = $id_receta";
        $rs_receta_original = DB::select($sql_crear_producto)[0];
        
        $sql_receta_nueva = "INSERT INTO `recetas`(`producto_id`, `descripcion`, `porciones`, `tiempo_preparacion`, `created_at`) 
        VALUES ($rs_producto_nuevo_id, '$rs_receta_original->descripcion','$rs_receta_original->porciones',0,now());
        SELECT LAST_INSERT_ID() as id;";
        $rs_receta_nueva_id = DB::select($sql_receta_nueva)[0]->id;
//Crear receta





//Crear detalle receta
        $sql_detalle_receta_original = "SELECT * from receta_detalles where receta_id = $id_receta and insumo_id NOT IN ($id_insumos_modificados)";
        $rs_detalle_receta_original = DB::select($sql_detalle_receta_original);

        foreach($rs_detalle_receta_original as $row){
            $insert_detalle = "INSERT INTO `receta_detalles`(`receta_id`, `insumo_id`, `cantidad`, `tipo_preparacion`, `created_at`)
             VALUES ($rs_receta_nueva_id, $row->insumo_id, $row->cantidad, '$row->tipo_preparacion', 'now()')";
             DB::select($insert_detalle);
        }

        foreach($insumos_nuevos as $insumo){

            $id_insumo = $insumo['id'];
            $id_preparacion = $insumo['id_preparacion'];

            $sql_tipo_preparacion = "SELECT p.* from preparacions as p where p.insumo_id =$id_insumo and p.id =$id_preparacion";
            $rs_preparacion = DB::select($insert_detalle)[0];

            $insert_detalle = "INSERT INTO `receta_detalles`(`receta_id`, `insumo_id`, `cantidad`, `tipo_preparacion`, `created_at`)
            VALUES ($rs_receta_nueva_id, $rs_preparacion->insumo_id, 1, '$rs_preparacion->tipo_preparacion', 'now()')";
            DB::select($insert_detalle);

        }
//Crear detalle receta

        return array("status"=>"200","message"=>"Plato Creado","data"=>$rs_receta_nueva_id);

    }





}
