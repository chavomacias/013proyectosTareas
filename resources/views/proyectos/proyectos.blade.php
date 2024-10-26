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
                    <div id="mensajeAlertTabla"></div>
                        <div class="table-responsive">

                        <table class="table table-striped">
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
    <div class="modal" tabindex="-1" id="modalMoficiarProyecto"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="mensajeAlertModal"></div>
                <div class="row">
                    <div class="col-lg-6" id="formModificarProyecto">
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input  autocomplete="new-password" type="text" maxlength="50" class="form-control form-control-sm" id="nombreModificar" name="nombreModificar" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                            <input  autocomplete="new-password" type="date" class="form-control form-control-sm" id="fechaInicioModificar" name="fechaInicioModificar" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="fechaFin" class="form-label">Fecha Fín</label>
                            <input  autocomplete="new-password" type="date" class="form-control form-control-sm" id="fechaFinModificar" name="fechaFinModificar" placeholder="">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea  autocomplete="new-password" style="resize: none;" class="form-control form-control-sm" id="descripcionModificar" name="descripcionModificar" rows="3"></textarea>
                        </div>

                        <div id="contenedorBtnFormulario">

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="modalTareas"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalTareas"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="mensajeAlertModalTareas"></div>
                <div class="row">
                    <div class="col-lg-6" id="formTareas">
                        
                        <div class="mb-3">
                            <label for="tituloTarea" class="form-label">Título</label>
                            <input  autocomplete="new-password" type="text" maxlength="50" class="form-control form-control-sm" id="tituloTarea" name="tituloTarea" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="fechaVencimiento" class="form-label">Fecha Vencimiento</label>
                            <input  autocomplete="new-password" type="date" class="form-control form-control-sm" id="fechaVencimiento" name="fechaVencimiento" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="descripcionTarea" class="form-label">Descripción</label>
                            <textarea  autocomplete="new-password" style="resize: none;" class="form-control form-control-sm" id="descripcionTarea" name="descripcionTarea" rows="3"></textarea>
                        </div>

                        <div id="contenedorBtnFormularioTareas">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="contenedorModalTareas" style="margin-top:10px;" class="col-12">

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function guardarTarea(idProyecto,index){
            const indexProyecto = proyectos.findIndex((x)=>x.id == idProyecto);
            if(indexProyecto != -1){

            
                var _token = document.getElementsByName('_token')[0].value;
                
                let fechaInicioProyecto = proyectos[indexProyecto].fecha_inicio;
                let tituloTarea = document.getElementById('tituloTarea').value;
                let fechaVencimiento = document.getElementById('fechaVencimiento').value;
                let descripcionTarea = document.getElementById('descripcionTarea').value;

                const partesFecha = fechaInicioProyecto.split('-');
                const ano = parseInt(partesFecha[0], 10);
                const mes = parseInt(partesFecha[1], 10) - 1;
                const dia = parseInt(partesFecha[2], 10);

                const partesFechaVencimiento = fechaVencimiento.split('-');
                const anoVencimiento = parseInt(partesFechaVencimiento[0], 10);
                const mesVencimiento = parseInt(partesFechaVencimiento[1], 10) - 1;
                const diaVencimiento = parseInt(partesFechaVencimiento[2], 10);



                let fechaInicioComparar = new Date(ano, mes, dia);
                let fechaVencimientoComparar = new Date(anoVencimiento, mesVencimiento, diaVencimiento);

                fechaInicioComparar.setHours(0, 0, 0, 0);
                fechaVencimientoComparar.setHours(0, 0, 0, 0);
            
                if(!tituloTarea || !fechaVencimiento || !descripcionTarea){
                    presentarMensajeAlert('mensajeAlertModalTareas',"Debe completar el formulario");
                }else if(tituloTarea?.length < 3){
                    presentarMensajeAlert('mensajeAlertModalTareas',"El nombre de la tarea debe tener mínimo 3 caracteres");
                }else if(fechaVencimientoComparar < fechaInicioComparar){
                    presentarMensajeAlert('mensajeAlertModalTareas',"La fecha de vencimiento no debe ser menor a la fecha de inicio del proyecto");
                }else{
                    let data = {
                        id_proyecto:idProyecto,
                        titulo:tituloTarea,
                        descripcion:descripcionTarea,
                        fecha_vencimiento:fechaVencimiento,
                        _token:_token,
                    };

                    $.ajax({
                        url : '{{url("guardartarea")}}',
                        type: 'post',
                        dataType: 'JSON',
                        data:data,
                        beforeSend: function(){
                            $("#mensajeAlertModalTareas").html('');
                        },
                        uploadProgress: function(event,position,total,percentComplete){
                            
                        },
                        success: function(data){
                            if(data.status == "success"){
                                 console.log('guardarTarea',data);
                                 proyectos[indexProyecto].tareas.unshift(data.tarea);
                                 cargarTareas(idProyecto,index);
                                 const inputs = document.querySelectorAll('#formTareas input,#formProyecto textarea');
                                inputs.forEach(input => {
                                    input.value = '';
                                })
                                presentarMensajeAlert('mensajeAlertModalTareas',data.mensaje,"success");
                            }else{
                                presentarMensajeAlert('mensajeAlertModalTareas',data.mensaje,"error");
                            }
                        },
                        complete: function(){

                        },
                        error: function(xhr, textStatus, errorThrown) {
                            if(xhr.status == 0){
                                presentarMensajeAlert('mensajeAlertModalTareas','No se puede comunicar con el servidor',"error");
                            }else if(xhr.status == 401){
                                presentarMensajeAlert('mensajeAlertModalTareas','Usuario o clave no son correctos',"error");
                            }else{
                                presentarMensajeAlert('mensajeAlertModalTareas',xhr.status+': '+xhr.statusText,"error");
                            }
                            
                        }
                    });
                }
            }
        }

        function modificarTarea(idProyecto,idTarea,index,indexTarea){
            const indexProyecto = proyectos.findIndex((x)=>x.id == idProyecto);
            if(indexProyecto != -1){

            
                var _token = document.getElementsByName('_token')[0].value;
                
                let fechaInicioProyecto = proyectos[indexProyecto].fecha_inicio;
                let tituloTarea = document.getElementById('tituloTareaModificar'+indexTarea).value;
                let fechaVencimiento = document.getElementById('fechaVencimientoModificar'+indexTarea).value;
                let descripcionTarea = document.getElementById('descripcionTareaModificar'+indexTarea).value;

                let completada = 0;
                if($("#completada"+indexTarea).is(':checked')){
                    completada = 1;
                }

                const partesFecha = fechaInicioProyecto.split('-');
                const ano = parseInt(partesFecha[0], 10);
                const mes = parseInt(partesFecha[1], 10) - 1;
                const dia = parseInt(partesFecha[2], 10);

                const partesFechaVencimiento = fechaVencimiento.split('-');
                const anoVencimiento = parseInt(partesFechaVencimiento[0], 10);
                const mesVencimiento = parseInt(partesFechaVencimiento[1], 10) - 1;
                const diaVencimiento = parseInt(partesFechaVencimiento[2], 10);



                let fechaInicioComparar = new Date(ano, mes, dia);
                let fechaVencimientoComparar = new Date(anoVencimiento, mesVencimiento, diaVencimiento);

                fechaInicioComparar.setHours(0, 0, 0, 0);
                fechaVencimientoComparar.setHours(0, 0, 0, 0);
            
                if(!idTarea || !tituloTarea || !fechaVencimiento || !descripcionTarea){
                    presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,"Debe completar el formulario");
                }else if(tituloTarea?.length < 3){
                    presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,"El nombre de la tarea debe tener mínimo 3 caracteres");
                }else if(fechaVencimientoComparar < fechaInicioComparar){
                    presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,"La fecha de vencimiento no debe ser menor a la fecha de inicio del proyecto");
                }else{
                    let data = {
                        id:idTarea,
                        id_proyecto:idProyecto,
                        titulo:tituloTarea,
                        descripcion:descripcionTarea,
                        fecha_vencimiento:fechaVencimiento,
                        completada:completada,
                        _token:_token,
                    };

                    console.log('data',data);

                    $.ajax({
                        url : '{{url("modificartarea")}}',
                        type: 'put',
                        dataType: 'JSON',
                        data:data,
                        beforeSend: function(){
                            $("#mensajeAlertModalTareas"+indexTarea).html('');
                        },
                        uploadProgress: function(event,position,total,percentComplete){
                            
                        },
                        success: function(data){
                            if(data.status == "success"){
                                console.log('modificarTarea',data);
                                proyectos[indexProyecto].tareas[indexTarea] = data.tarea;
                                $("#tarea"+indexTarea+" button").text(tituloTarea);
                                presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,data.mensaje,"success");
                            }else{
                                presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,data.mensaje,"error");
                            }
                        },
                        complete: function(){

                        },
                        error: function(xhr, textStatus, errorThrown) {
                            if(xhr.status == 0){
                                presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,'No se puede comunicar con el servidor',"error");
                            }else if(xhr.status == 401){
                                presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,'Usuario o clave no son correctos',"error");
                            }else{
                                presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,xhr.status+': '+xhr.statusText,"error");
                            }
                            
                        }
                    });
                }
            }
        }

        function eliminarTarea(idProyecto,idTarea,index,indexTarea){
            const indexProyecto = proyectos.findIndex((x)=>x.id == idProyecto);
            if(indexProyecto != -1){

            
                var _token = document.getElementsByName('_token')[0].value;
                

                let data = {
                    id:idTarea,
                    _token:_token,
                };

                console.log('data',data);

                $.ajax({
                    url : '{{url("eliminartarea")}}',
                    type: 'delete',
                    dataType: 'JSON',
                    data:data,
                    beforeSend: function(){
                        $("#mensajeAlertModalTareas"+indexTarea).html('');
                    },
                    uploadProgress: function(event,position,total,percentComplete){
                        
                    },
                    success: function(data){
                        if(data.status == "success"){
                            console.log('eliminarTarea',data);
                            const indexProyecto = proyectos.findIndex((x)=>x.id == idProyecto);
                            if(indexProyecto != -1){
                                const indexTarea = proyectos[indexProyecto].tareas.findIndex((x)=>x.id == idTarea);
                                if(indexTarea != -1){
                                    proyectos[indexProyecto].tareas.splice(indexTarea, 1);
                                    cargarTareas(idProyecto,index);
                                }
                            }
                            presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,data.mensaje,"success");
                        }else{
                            presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,data.mensaje,"error");
                        }
                    },
                    complete: function(){

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        if(xhr.status == 0){
                            presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,'No se puede comunicar con el servidor',"error");
                        }else if(xhr.status == 401){
                            presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,'Usuario o clave no son correctos',"error");
                        }else{
                            presentarMensajeAlert('mensajeAlertModalTareas'+indexTarea,xhr.status+': '+xhr.statusText,"error");
                        }
                        
                    }
                });
                
            }
        }

        function cargarTareas(idProyecto,index){
            const indexProyecto = proyectos.findIndex((x)=>x.id == idProyecto);
            if(indexProyecto != -1){
                 let btnGuardarTarea = '<div class="d-grid gap-2"  style="margin-bottom:5px"><button onclick="guardarTarea('+idProyecto+','+index+')" id="btnGuardarTarea" name="btnGuardarTarea" class="btn btn-primary" type="button">Guardar</button></div>';
                $("#contenedorBtnFormularioTareas").html(btnGuardarTarea); 

               

                
                let proyecto = proyectos[indexProyecto];
                $("#tituloModalTareas").html('Tareas: '+proyecto.nombre)

                let accordion = '';
                proyecto.tareas.forEach((tarea,indexTarea)=>{
                    let completada = '';
                    if(tarea.completada == true){
                        completada = 'checked';
                    }

                    let checkBox = '<div class="form-check">'+
                        '<input '+completada+' style="cursor:pointer;" class="form-check-input" type="checkbox" value="" id="completada'+indexTarea+'">'+
                        '<label style="cursor:pointer;" class="form-check-label" for="completada'+indexTarea+'">'+
                            'Completada'+
                        '</label>'+
                    '</div>';
                    let btnModificar = '<div class="d-grid gap-2"  style="margin-bottom:5px"><button onclick="modificarTarea('+idProyecto+','+tarea.id+','+index+','+indexTarea+')" id="btnModificar" name="btnModificar" class="btn btn-success" type="button">Modificar</button></div>';


                    let btnEliminar = '<div class="d-grid gap-2"  style="margin-bottom:5px"><button onclick="eliminarTarea('+idProyecto+','+tarea.id+','+index+','+indexTarea+')" id="btnModificar" name="btnModificar" class="btn btn-danger" type="button">Eliminar</button></div>';


                    let inputTituloTarea = '<div class="mb-3">'+
                            '<label for="tituloTareaModificar" class="form-label">Título</label>'+
                            '<input  autocomplete="new-password" type="text" maxlength="50" class="form-control form-control-sm" id="tituloTareaModificar'+indexTarea+'" name="tituloTareaModificar'+indexTarea+'" placeholder="" value="'+tarea.titulo+'">'+
                    '</div>';

                    let inputFechaVencimiento = '<div class="mb-3">'+
                            '<label for="fechaVencimientoModificar'+indexTarea+'" class="form-label">Fecha Vencimiento</label>'+
                            '<input  autocomplete="new-password" type="date" class="form-control form-control-sm" id="fechaVencimientoModificar'+indexTarea+'" name="fechaVencimientoModificar'+indexTarea+'" placeholder="" value="'+tarea.fecha_vencimiento+'">'+
                    '</div>';

                    let inputDescripcion = '<div class="mb-3">'+
                            '<label for="descripcionTareaModificar'+indexTarea+'" class="form-label">Descripción</label>'+
                            '<textarea  autocomplete="new-password" style="resize: none;" class="form-control form-control-sm" id="descripcionTareaModificar'+indexTarea+'" name="descripcionTareaModificar'+indexTarea+'" rows="3">'+tarea.descripcion+'</textarea>'+
                        '</div>';

                    accordion = accordion + '<div class="accordion-item">'+
                        '<h2 class="accordion-header" id="tarea'+indexTarea+'">'+
                            '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'+indexTarea+'" aria-expanded="true" aria-controls="collapseOne">'+
                                tarea.titulo+
                            '</button>'+
                        '</h2>'+
                        '<div id="collapseOne'+indexTarea+'" class="accordion-collapse collapse" aria-labelledby="tarea'+indexTarea+'" data-bs-parent="#accordionExample">'+
                            '<div class="accordion-body">'+
                                '<div class="row">'+
                                    '<div class="col-12" id="mensajeAlertModalTareas'+indexTarea+'">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-4">'+
                                        inputTituloTarea+
                                    '</div>'+
                                    '<div class="col-4">'+
                                        inputFechaVencimiento+
                                    '</div>'+
                                    '<div class="col-4">'+
                                        checkBox+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-4">'+
                                        inputDescripcion+
                                    '</div>'+
                                    '<div class="col-4">'+
                                        btnModificar+
                                    '</div>'+
                                    '<div class="col-4">'+
                                        btnEliminar+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                });

                let grupoAccordion = '<div class="accordion accordion-flush" id="accordionExample">'+
                    accordion+
                '</div>';
                $("#contenedorModalTareas").html(grupoAccordion);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            obtenerProyectos();
        })

        function modificarProyecto(id,index){
            
            var _token = document.getElementsByName('_token')[0].value;
            let nombre = document.getElementById('nombreModificar').value;
            let fechaInicio = document.getElementById('fechaInicioModificar').value;
            let fechaFin = document.getElementById('fechaFinModificar').value;
            let descripcion = document.getElementById('descripcionModificar').value;

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
                presentarMensajeAlert('mensajeAlertModal',"Debe completar el formulario");
            }else if(nombre?.length < 5){
                presentarMensajeAlert('mensajeAlertModal',"El nombre del proyecto debe tener mínimo 5 caracteres");
            }else if(fechaInicioComparar > fechaFinComparar){
                presentarMensajeAlert('mensajeAlertModal',"La fecha de inicio no debe ser mayor a la fecha fín");
            }else{
                let data = {
                    id:id,
                    nombre:nombre,
                    fecha_inicio:fechaInicio,
                    fecha_fin:fechaFin,
                    descripcion:descripcion,
                    _token:_token,
                };

                $.ajax({
                    url : '{{url("modificarproyecto")}}',
                    type: 'put',
                    dataType: 'JSON',
                    data:data,
                    beforeSend: function(){
                        $("#mensajeAlertModal").html('');
                    },
                    uploadProgress: function(event,position,total,percentComplete){
                        
                    },
                    success: function(data){
                        if(data.status == "success"){
                            console.log('guardarProyecto',data);
                       //     proyectos.unshift(data.proyecto);
                            const indexProyecto = proyectos.findIndex((x)=>x.id == id);
                            if(indexProyecto != -1){
                                proyectos[indexProyecto] = data.proyecto;
                                cargarTablaProyectos(proyectos);
                            }
                            presentarMensajeAlert('mensajeAlertModal',data.mensaje,"success");
                        }else{
                            presentarMensajeAlert('mensajeAlertModal',data.mensaje,"error");
                        }
                    },
                    complete: function(){

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        if(xhr.status == 0){
                            presentarMensajeAlert('mensajeAlertModal','No se puede comunicar con el servidor',"error");
                        }else if(xhr.status == 401){
                            presentarMensajeAlert('mensajeAlertModal','Usuario o clave no son correctos',"error");
                        }else{
                            presentarMensajeAlert('mensajeAlertModal',xhr.status+': '+xhr.statusText,"error");
                        }
                        
                    }
                });
            }
        }
        
        function cargarModificarProyecto(id,index){
            const indexProyecto = proyectos.findIndex((x)=>x.id == id);
            if(indexProyecto != -1){
                $("#mensajeAlertModal").html('');
                let proyecto = proyectos[indexProyecto];
                $("#nombreModificar").val(proyecto.nombre);
                $("#fechaInicioModificar").val(proyecto.fecha_inicio);
                $("#fechaFinModificar").val(proyecto.fecha_fin);
                $("#descripcionModificar").val(proyecto.descripcion);
                let btnModificar = '<div class="d-grid gap-2"  style="margin-bottom:5px"><button onclick="modificarProyecto('+id+','+index+')" id="btnModificar" name="btnModificar" class="btn btn-success" type="button">Guardar</button></div>';
/* 
                let btnCancelar = '<div class="d-grid gap-2"  style="margin-bottom:5px"><button onclick="cancelarModificarProyecto();" id="btnModificar" name="btnModificar" class="btn btn-danger" type="button">Modificar</button></div>'; */

                $("#contenedorBtnFormulario").html(btnModificar);
            }else{
                cargarTablaProyectos(proyectos);
            }
            
        }
        function cargarTablaProyectos(proyectos){
            let filaProyecto = '';
            proyectos.forEach((proyecto,index)=>{
                let btnEliminar = '<div class="d-grid gap-2" style="margin-bottom:5px">'+
                    '<button title="Eliminar '+proyecto.nombre+'" onclick="eliminarProyecto('+proyecto.id+','+index+')" id="btnEliminar'+index+'" name="btnEliminar'+index+'" class="btn btn-danger btn-sm" type="button"><i class="bi bi-trash"></i></button>'+
                '</div>';

                let btnModificar = '<div class="d-grid gap-2" style="margin-bottom:5px">'+
                    '<button title="Modificar '+proyecto.nombre+'" data-bs-toggle="modal" data-bs-target="#modalMoficiarProyecto" onclick="cargarModificarProyecto('+proyecto.id+','+index+')" id="btnModificar'+index+'" name="btnModificar'+index+'" class="btn btn-success btn-sm" type="button"><i class="bi bi-pencil"></i></button>'+
                '</div>';

  /*               let btnTareas = '<div class="d-grid gap-2" style="margin-bottom:5px">'+
                        '<button title="Ver Tareas de '+proyecto.nombre+'" onclick="tareasProyecto(\"'+proyecto.id+'\")" id="btnTareas'+index+'" name="btnTareas'+index+'" class="btn btn-primary btn-sm" type="button"><i class="bi bi-card-checklist"></i></button>'+
                '</div>'; */


                filaProyecto = filaProyecto+'<tr data-bs-toggle="modal" data-bs-target="#modalTareas" onclick="cargarTareas('+proyecto.id+','+index+')" style="cursor:pointer;" id="filaProyecto'+index+'">'+
                    '<td>'+proyecto.nombre+'</td>'+
                    '<td>'+proyecto.fecha_inicio+'</td>'+
                    '<td>'+proyecto.fecha_fin+'</td>'+
                    '<td>'+proyecto.descripcion+'</td>'+
                    '<td>'+btnModificar+btnEliminar+'</td>'+
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
            }else if(nombre?.length < 5){
                presentarMensajeAlert('mensajeAlert',"El nombre del proyecto debe tener mínimo 5 caracteres");
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
                            const inputs = document.querySelectorAll('#formProyecto input, #formProyecto textarea');
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

        function eliminarProyecto(id,index){
            var _token = document.getElementsByName('_token')[0].value;
            let data = {
                id:id,
                _token:_token,
            };

            $.ajax({
                url : '{{url("eliminarproyecto")}}',
                type: 'delete',
                dataType: 'JSON',
                data:data,
                beforeSend: function(){
                    $("#mensajeAlertTabla").html('');
                },
                uploadProgress: function(event,position,total,percentComplete){
                    
                },
                success: function(data){
                    if(data.status == "success"){
                        console.log('eliminarProyecto',data);
                        const indexProyecto = proyectos.findIndex((x)=>x.id == id);
                        if(indexProyecto != -1){
                            proyectos.splice(indexProyecto, 1);
                            cargarTablaProyectos(proyectos);
                        }
                        presentarMensajeAlert('mensajeAlertTabla',data.mensaje,"success");
                    }else{
                        presentarMensajeAlert('mensajeAlertTabla',data.mensaje,"error");
                    }
                },
                complete: function(){

                },
                error: function(xhr, textStatus, errorThrown) {
                    if(xhr.status == 0){
                        presentarMensajeAlert('mensajeAlertTabla','No se puede comunicar con el servidor',"error");
                    }else if(xhr.status == 401){
                        presentarMensajeAlert('mensajeAlertTabla','Usuario o clave no son correctos',"error");
                    }else{
                        presentarMensajeAlert('mensajeAlertTabla',xhr.status+': '+xhr.statusText,"error");
                    }
                    
                }
            });
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

