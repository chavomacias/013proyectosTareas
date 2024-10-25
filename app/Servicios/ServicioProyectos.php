<?php

namespace App\Servicios;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ServicioProyectos
{

    public function filtrarProyecto($id){
        $proyecto = Proyecto::find($id);
        return $proyecto;
    }

    public function obtenerProyectos(){
        $proyectos = Proyecto::all();
        return $proyectos;
    }
    public function insertarProyecto(Request $proyecto){
        $nuevoProyecto = new Proyecto();
        $nuevoProyecto->nombre = $proyecto->nombre;
        $nuevoProyecto->descripcion = $proyecto->descripcion;
        $nuevoProyecto->fecha_inicio = $proyecto->fecha_inicio;
        $nuevoProyecto->fecha_fin = $proyecto->fecha_fin;
        $nuevoProyecto->save();
        return $nuevoProyecto;
    }


    public function modificarProyecto(Request $proyecto){
        $modificarProyecto = $this->filtrarProyecto($proyecto->id);
        $modificarProyecto->nombre = $proyecto->nombre;
        $modificarProyecto->descripcion = $proyecto->descripcion;
        $modificarProyecto->fecha_inicio = $proyecto->fecha_inicio;
        $modificarProyecto->fecha_fin = $proyecto->fecha_fin;
        $modificarProyecto->save();
        return $modificarProyecto;
    }

    public function eliminarProyecto(Request $proyecto){
        $eliminarProyecto = $this->filtrarProyecto($proyecto->id);
        $eliminarProyecto->delete();
    }
}


?>