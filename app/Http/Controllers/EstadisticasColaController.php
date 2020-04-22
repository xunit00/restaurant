<?php

namespace App\Http\Controllers;

// use App\Models\Insumo;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\DB;
// use App\Models\TransaccionInventario;
// use App\Models\TransaccionInventarioDetalle;
use Illuminate\Http\Request;
use DB;

class EstadisticasColaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $ordenes = Orden::latest()->paginate(10);

       $resultados = array();
             
        return view('reporte.statscola.index', compact('resultados'));//, compact('ordenes'));
    }

    public function get_data(){
        return $this->estadisticas_de_cola($_POST['pn']);
    }


    private function estadisticas_de_cola($n = 1){

			
        $sql_insert_cola="INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (1, 1, '00:00:02', 'Listo', '31', 1, '2020-04-22 15:55:19', '2020-04-22 15:55:50');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (2, 3, '00:00:23', 'Listo', '12', 1, '2020-04-22 15:55:25', '2020-04-22 15:56:00');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (3, 2, '00:03:23', 'Listo', '323', 1, '2020-04-22 15:59:29', '2020-04-22 15:59:59');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (4, 4, '00:00:23', 'Listo', '123', 1, '2020-04-22 15:59:59', '2020-04-22 16:01:59');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (5, 2, '00:00:32', 'Listo', '1', 1, '2020-04-22 16:01:09', '2020-04-22 16:59:51');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (6, 2, '01:31:31', 'Listo', '1', 1, '2020-04-22 16:02:10', '2020-04-22 16:04:10');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (7, 3, '00:12:31', 'Listo', '1', 1, '2020-04-22 16:02:43', '2020-04-22 16:03:43');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (8, 4, '00:01:21', 'Listo', '2', 1, '2020-04-22 16:04:45', '2020-04-22 16:04:59');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (9, 2, '00:06:46', 'Listo', '1', 1, '2020-04-22 16:09:21', '2020-04-22 16:20:25');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (10, 3, '00:00:32', 'Listo', '1', 1, '2020-04-22 16:03:27', '2020-04-22 16:57:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (11, 12, '00:02:31', 'Listo', '1', 1, '2020-04-22 16:05:27', '2020-04-22 16:10:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (12, 1, '00:02:31', 'Listo', '1', 1, '2020-04-22 16:06:27', '2020-04-22 16:10:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (13, 2, '14:25:19', 'Listo', '2', 2, '2020-04-22 16:10:27', '2020-04-22 16:16:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (14, 1, '00:00:00', 'Listo', '1', 1, '2020-04-22 16:19:27', '2020-04-22 16:22:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (15, 1, '15:25:39', 'Listo', '1', 1, '2020-04-22 16:30:27', '2020-04-22 16:49:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (16, 22, '15:25:47', 'Listo', '1', 1, '2020-04-22 16:36:27', '2020-04-22 16:46:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (17, 33, '15:25:56', 'Listo', '1', 1, '2020-04-22 17:36:27', '2020-04-22 17:46:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (18, 44, '15:26:06', 'Listo', '1', 1, '2020-04-22 17:36:27', '2020-04-22 17:56:27');
        INSERT INTO `restaurante`.`colas`(`id`, `num_orden`, `tiempo_preparacion`, `estado`, `descripcion_plato`, `receta_id`, `created_at`, `updated_at`) VALUES (19, 45, '15:26:26', 'Listo', '1', 1, '2020-04-22 17:46:27', '2020-04-22 17:59:27');
        ";
        // $rs_landa = DB::select($sql_insert_cola);
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

            return array("status"=>"400",
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
                "wq"=>$tiempo_en_cola." Minutos",
                "minutos_servicio"=>$minutos_servicio,
                "minutos_llegada"=>$minutos_llegada,
                "calculo_test"=>(1 -($minutos_llegada/$minutos_servicio)));


    }


}