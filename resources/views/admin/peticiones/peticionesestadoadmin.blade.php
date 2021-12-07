<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cambiar Estado de Petición') }}
            @section('title', 'ReciWeb - Cambiar Estado de Petición')
        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <form action="{{ url('/peticionesactual/'.$peticiones->idpeticiones.'/'.$peticiones->hogar_id) }}" class="form-card" method="POST" >
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Cambiar el Estado
                                </label>
                                <select class="form-select col-sm-8 d-flex" id='selector' onselect="foo(this);" aria-label="Default select example" require>
                                    <option selected>Seleccione una opción</option>
                                    <option value="En espera">En espera</option>
                                    <option value="Correcciones">Correcciones</option>
                                    <option value="Aceptada">Aceptada</option>
                                    <option value="En recoleccion">En recoleccion</option>
                                    <option value="Finalizada">Finalizada</option>
                                </select>
                                <br/>
                            </div>
                            <hr>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <br/>
                                <label class="form-control-label px-3">
                                    Estado de la Petición
                                </label>
                                <input type="text" id="estado_peticion" name="estado_peticion" value="{{ $peticiones->estado_peticion }}" readonly>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Comentarios (Puede añadir sus propios comentarios)
                                </label>
                                <textarea class="form-control" id="comentarios" name="comentarios" rows="5" value="{{ $peticiones->comentarios }}" required>{{ $peticiones->comentarios }}</textarea>
                            </div>
                            <div id="otros" style="display:none;">
                                <div class="form-group col-sm-8 flex-column d-flex">
                                    <label class="form-control-label px-3">
                                        Puntos
                                    </label>
                                    <input type="text" id="puntospeticiones" name="puntospeticiones" value="0">
                                </div>
                                <div class="form-group col-sm-8 flex-column d-flex">
                                    <label class="form-control-label px-3">
                                        Peso(kg). [Utilice el diferenciador . (PUNTO) como separador en los decimales.]
                                    </label>
                                    <input type="text" id="pesopeticiones" name="pesopeticiones" value="0">
                                </div>
                            </div>

                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Id del Hogar
                                </label>
                                <input type="number" id="hogar_id" name="hogar_id" value="{{ $peticiones->hogar_id }}" readonly>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><input onclick="return confirm('¿Quieres Actualizar el estado de esta petición de esta forma?')" type="submit" value="Actualizar Estado"></center>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><a href="{{url('/peticionesadmin')}}""><input type="button"  class="btn btn-danger" value="Cancelar"></a></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#selector').change(function() {
                var seleccionado = $(this).find(":selected").val();
                if(seleccionado== 'En espera'){

                    document.getElementById('otros').style.display = 'none';
                    $("#puntospeticiones").val('0');
                    $("#pesopeticiones").val('0');

                    $("#estado_peticion").val(seleccionado);
                    $("#comentarios").val('A la espera de confirmación.');
                }else if(seleccionado== 'Correcciones'){

                    document.getElementById('otros').style.display = 'none';
                    $("#puntospeticiones").val('0');
                    $("#pesopeticiones").val('0');

                    document.getElementById('otros').style.display = 'none';
                    $("#estado_peticion").val(seleccionado);
                    $("#comentarios").val('Por favor corrija la información de la petición basado en los parámetros indicados dentro del formulario de EDICIÓN DE PETICIONES.');
                }else if(seleccionado== 'Aceptada'){

                    document.getElementById('otros').style.display = 'none';
                    $("#puntospeticiones").val('0');
                    $("#pesopeticiones").val('0');

                    $("#estado_peticion").val(seleccionado);
                    $("#comentarios").val('Su petición ha sido aceptada.');
                }else if(seleccionado== 'En recoleccion'){

                    document.getElementById('otros').style.display = 'none';
                    $("#puntospeticiones").val('0');
                    $("#pesopeticiones").val('0');

                    const dat = new Date();
                    var fecha = dat.getDate() + "/" + (dat.getMonth() +1) + "/" + dat.getFullYear();

                    $("#estado_peticion").val(seleccionado);
                    $("#comentarios").val('En las próximas 72 horas a partir del '+fecha+', será recolectada su petición.');
                }else if(seleccionado== 'Finalizada'){
                    document.getElementById('otros').style.display = 'block';
                    
                    const dat = new Date();
                    var fecha = dat.getDate() + "/" + (dat.getMonth() +1) + "/" + dat.getFullYear();

                    $("#estado_peticion").val(seleccionado);
                    $("#comentarios").val('Gracias por utilizar ReciWeb. ('+fecha+')');
                }
            });
        });

        jQuery(document).ready(function(){
			// Listen for the input event.
			jQuery("#puntospeticiones").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9,.]/g, ''));
			});
            jQuery("#pesopeticiones").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9,.]/g, ''));
			});
		});

        
    </script>

    <style>

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
    </style>
</x-app-layout>
