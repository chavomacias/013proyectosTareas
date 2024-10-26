<?php

namespace App\Http\Controllers\Proyectos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\ServicioTareas;
use Illuminate\Support\Facades\DB;


class TareasController extends Controller
{
    public function delete(Request $request)
    {
        $mensaje = "Error interno del servidor";
        $status = "error";
		try {
            $result = DB::transaction(function() use($request,$mensaje,$status) {
                $servicioTareas = new ServicioTareas();
                $tarea = $servicioTareas->eliminarTarea($request);
                $mensaje = "Eliminada exitosamente";
                $status = "success";
                $arrayRetorno = [
                    'status' => $status,
                    'mensaje' => $mensaje,
                    'tarea'=>$tarea
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

    public function update(Request $request)
    {
        $mensaje = "Error interno del servidor";
        $status = "error";
		try {
            $result = DB::transaction(function() use($request,$mensaje,$status) {
                $servicioTareas = new ServicioTareas();
                $tarea = $servicioTareas->modificarTarea($request);
                $mensaje = "Guardada exitosamente";
                $status = "success";
                $arrayRetorno = [
                    'status' => $status,
                    'mensaje' => $mensaje,
                    'tarea'=>$tarea
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

    public function store(Request $request)
    {
        $mensaje = "Error interno del servidor";
        $status = "error";
		try {
            $result = DB::transaction(function() use($request,$mensaje,$status) {
                $servicioTareas = new ServicioTareas();
                $tarea = $servicioTareas->insertarTarea($request);
                $mensaje = "Guardada exitosamente";
                $status = "success";
                $arrayRetorno = [
                    'status' => $status,
                    'mensaje' => $mensaje,
                    'tarea'=>$tarea
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
