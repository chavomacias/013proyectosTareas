<?php

namespace App\Servicios;

use App\Models\Tarea;
use Illuminate\Http\Request;

class ServicioTareas
{
    public function filtrarTarea($id){
        $tarea = Tarea::find($id);
        return $tarea;
    }

    public function obtenerTareas(){
        $tareas = Tarea::get();
        return $tareas;
    }
    public function insertarTarea(Request $tarea){
        $nuevaTarea = new Tarea();
        $nuevaTarea->id_proyecto = $tarea->id_proyecto;
        $nuevaTarea->titulo = $tarea->titulo;
        $nuevaTarea->descripcion = $tarea->descripcion;
        $nuevaTarea->fecha_vencimiento = $tarea->fecha_vencimiento;
        $nuevaTarea->save();
        return $nuevaTarea;
    }


    public function modificarTarea(Request $tarea){
        $modificarTarea = $this->filtrarTarea($tarea->id);
        $modificarTarea->id_proyecto = $tarea->id_proyecto;
        $modificarTarea->titulo = $tarea->titulo;
        $modificarTarea->descripcion = $tarea->descripcion;
        $modificarTarea->completada = $tarea->completada;
        $modificarTarea->fecha_vencimiento = $tarea->fecha_vencimiento;
        $modificarTarea->save();
        return $modificarTarea;
    }

    public function eliminarTarea(Request $tarea){
        $eliminarTarea = $this->filtrarTarea($tarea->id);
        $eliminarTarea->delete();
    }


}


?>