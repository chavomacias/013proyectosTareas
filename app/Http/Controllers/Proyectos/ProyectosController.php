<?php

namespace App\Http\Controllers\Proyectos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\ServicioProyectos;
use Illuminate\Support\Facades\DB;

class ProyectosController extends Controller
{
    public function index()
    {
/*         $servicioProyectos = new ServicioProyectos();
        $proyectos = $servicioProyectos->obtenerProyectos();
        $arrayRetorno = [
            'proyectos'=>$proyectos
        ];
        return view('proyectos.proyectos')->with('arrayRetorno', $arrayRetorno); */
        return view('proyectos.proyectos');
    }

    public function proyectos()
    {
        $servicioProyectos = new ServicioProyectos();
        $proyectos = $servicioProyectos->obtenerProyectos();
        $arrayRetorno = [
            'proyectos'=>$proyectos
        ];
        return response()->json($arrayRetorno);
    }

    public function store(Request $request)
    {
        $mensaje = "No se pudo eliminar la rifa intenta más tarde";
        $status = "error";
		try {
            $result = DB::transaction(function() use($request,$mensaje,$status) {
                $servicioProyectos = new ServicioProyectos();
                $proyecto = $servicioProyectos->insertarProyecto($request);
                $mensaje = "Guardado exitosamente";
                $status = "success";
                $arrayRetorno = [
                    'status' => $status,
                    'mensaje' => $mensaje,
                    'proyecto'=>$proyecto
                ];
                return response()->json($arrayRetorno);
            });
            return $result;
        } catch (\Exception $e) {
            $mensaje = $e->getMessage();
        }
        $arrayRetorno = [
            'status' => $status,
            'mensaje' => $mensaje,
        ];
        return $arrayRetorno;
    }
}
