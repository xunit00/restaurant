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
                "wq"=>$tiempo_en_cola." Minutos");


    }


}