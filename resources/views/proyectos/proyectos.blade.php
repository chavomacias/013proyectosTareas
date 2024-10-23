@extends('layouts._inicio')

@section('content')

@csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-12 justify-content-md-center">
            <div id="mensajeAlert"></div>
                <div class="row">
                    <div class="col-lg-6" id="formProyecto">
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input  autocomplete="new-password" type="text" maxlength="50" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                            <input  autocomplete="new-password" type="date" class="form-control form-control-sm" id="fechaInicio" name="fechaInicio" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="fechaFin" class="form-label">Fecha Fín</label>
                            <input  autocomplete="new-password" type="date" class="form-control form-control-sm" id="fechaFin" name="fechaFin" placeholder="">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea  autocomplete="new-password" style="resize: none;" class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button onclick="guardarProyecto()" id="btnGuardar" name="btnGuardar" class="btn btn-primary" type="button">Guardar</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <h3>Listado de proyectos</h3>
                        <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fín</th>
                                    <th>Descripción</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTablaProyectos">

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
           
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){
            obtenerProyectos();
        })
        function cargarTablaProyectos(proyectos){
            let filaProyecto = '';
            proyectos.forEach((proyecto,index)=>{
                let btnEliminar = '<div class="d-grid gap-2" style="margin-bottom:5px">'+
                    '<button title="Eliminar '+proyecto.nombre+'" onclick="eliminarProyecto(\"'+proyecto.id+'\")" id="btnEliminar'+index+'" name="btnEliminar'+index+'" class="btn btn-danger btn-sm" type="button"><i class="bi bi-trash"></i></button>'+
                '</div>';

                let btnTareas = '<div class="d-grid gap-2" style="margin-bottom:5px">'+
                        '<button title="Ver Tareas de '+proyecto.nombre+'" onclick="tareasProyecto(\"'+proyecto.id+'\")" id="btnTareas'+index+'" name="btnTareas'+index+'" class="btn btn-primary btn-sm" type="button"><i class="bi bi-card-checklist"></i></button>'+
                '</div>';


                filaProyecto = filaProyecto+'<tr id="filaProyecto'+index+'">'+
                    '<td>'+proyecto.nombre+'</td>'+
                    '<td>'+proyecto.fecha_inicio+'</td>'+
                    '<td>'+proyecto.fecha_fin+'</td>'+
                    '<td>'+proyecto.descripcion+'</td>'+
                    '<td>'+btnEliminar+btnTareas+'</td>'+
                +'</tr>';
            });
            $("#bodyTablaProyectos").html(filaProyecto);
        }
        var proyectos = [];
        function obtenerProyectos(){
            
            var _token = document.getElementsByName('_token')[0].value;


            $.ajax({
                url : '{{url("obtenerproyectos")}}',
                type: 'get',
                dataType: 'JSON',
                beforeSend: function(){

                },
                uploadProgress: function(event,position,total,percentComplete){

                },
                success: function(data){
                    proyectos = data?.proyectos ?? [];
                    cargarTablaProyectos(proyectos);
                    console.log('obtenerProyectos',data);
                },
                complete: function(){

                },
                error: function(xhr, textStatus, errorThrown) {
                    if(xhr.status == 0){
                        $("#bodyTablaProyectos").html('<tr><td colspan="4" class="text-center">No se puede comunicar con el servidor</td><tr>');
                    }else if(xhr.status == 401){
                        $("#bodyTablaProyectos").html('<tr><td colspan="4" class="text-center">Usuario o clave no son correctos</td><tr>');
                    }else{
                        $("#bodyTablaProyectos").html('<tr><td colspan="4" class="text-center">'+xhr.status+': '+xhr.statusText+'</td><tr>');
                    }
                }
            });
        }

        function guardarProyecto(){
            
            var _token = document.getElementsByName('_token')[0].value;
            let nombre = document.getElementById('nombre').value;
            let fechaInicio = document.getElementById('fechaInicio').value;
            let fechaFin = document.getElementById('fechaFin').value;
            let descripcion = document.getElementById('descripcion').value;

            const partesFecha = fechaInicio.split('-');
            const ano = parseInt(partesFecha[0], 10);
            const mes = parseInt(partesFecha[1], 10) - 1;
            const dia = parseInt(partesFecha[2], 10);

            const partesFechaFin = fechaFin.split('-');
            const anoFin = parseInt(partesFechaFin[0], 10);
            const mesFin = parseInt(partesFechaFin[1], 10) - 1;
            const diaFin = parseInt(partesFechaFin[2], 10);



            let fechaActualComparar = new Date();
            let fechaInicioComparar = new Date(ano, mes, dia);
            let fechaFinComparar = new Date(anoFin, mesFin, diaFin);
            fechaActualComparar.setHours(0, 0, 0, 0);
            fechaInicioComparar.setHours(0, 0, 0, 0);
            fechaFinComparar.setHours(0, 0, 0, 0);
            console.log('fechaActualComparar',fechaActualComparar)
            console.log('fechaInicioComparar',fechaInicioComparar)
            console.log('fechaFinComparar',fechaFinComparar)
           
            if(!nombre || !fechaInicio || !fechaFin || !descripcion){
                presentarMensajeAlert('mensajeAlert',"Debe completar el formulario");
            }else if(fechaInicioComparar < fechaActualComparar){
                presentarMensajeAlert('mensajeAlert',"La fecha de inicio no debe ser menor a la fecha actual");
            }else if(fechaInicioComparar > fechaFinComparar){
                presentarMensajeAlert('mensajeAlert',"La fecha de inicio no debe ser mayor a la fecha fín");
            }else{
                let data = {
                    nombre:nombre,
                    fecha_inicio:fechaInicio,
                    fecha_fin:fechaFin,
                    descripcion:descripcion,
                    _token:_token,
                };

                $.ajax({
                    url : '{{url("guardarproyecto")}}',
                    type: 'post',
                    dataType: 'JSON',
                    data:data,
                    beforeSend: function(){
                        $("#mensajeAlert").html('');
                    },
                    uploadProgress: function(event,position,total,percentComplete){
                        
                    },
                    success: function(data){
                        if(data.status == "success"){
                            console.log('guardarProyecto',data);
                            proyectos.unshift(data.proyecto);
                            cargarTablaProyectos(proyectos);
                            const inputs = document.querySelectorAll('#formProyecto input, #miDiv textarea');
                            inputs.forEach(input => {
                                input.value = '';
                            });
                            presentarMensajeAlert('mensajeAlert',data.mensaje,"success");
                        }else{
                            presentarMensajeAlert('mensajeAlert',data.mensaje,"error");
                        }
                    },
                    complete: function(){

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        if(xhr.status == 0){
                            presentarMensajeAlert('mensajeAlert','No se puede comunicar con el servidor',"error");
                        }else if(xhr.status == 401){
                            presentarMensajeAlert('mensajeAlert','Usuario o clave no son correctos',"error");
                        }else{
                            presentarMensajeAlert('mensajeAlert',xhr.status+': '+xhr.statusText,"error");
                        }
                        
                    }
                });
            }
        }


        function presentarMensajeAlert(contenedor,mensaje,tipo){
            if(tipo == "success"){
                $("#"+contenedor).html('<div class="alert alert-success  alert-dismissible fade show text-center" role="alert">'+mensaje+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }else{
                $("#"+contenedor).html('<div class="alert alert-danger  alert-dismissible fade show text-center" role="alert">'+mensaje+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
            
        }
    </script>

@endsection

