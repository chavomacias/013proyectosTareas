<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tarea;

class Proyecto extends Model
{
    
    public function Tareas(){
        return $this->hasMany(Tarea::class,'id_proyecto')
        ->orderBy('id','desc');
    } 

}
