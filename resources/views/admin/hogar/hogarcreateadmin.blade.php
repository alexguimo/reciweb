<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Hogar desde Admin') }}
            @section('title', 'ReciWeb - Crear Hogar desde Admin')

        </h2>
    </x-slot>

    <?php
    $miarreglo = array(
        "Aguada",
        "Albania",
        "Aratoca",
        "Barbosa",
        "Barichara",
        "Barrancabermeja",
        "Betulia",
        "Bolívar",
        "Bucaramanga",
        "Cabrera",
        "California",
        "Capitanejo",
        "Carcasí",
        "Cepitá",
        "Cerrito",
        "Charalá",
        "Charta",
        "Chima",
        "Chipatá",
        "Cimitarra",
        "Concepción",
        "Confines",
        "Contratación",
        "Coromoro",
        "Curití",
        "El Carmen de Chucurí",
        "El Guacamayo",
        "El Peñón",
        "El Playón",
        "Encino",
        "Enciso",
        "Florián",
        "Floridablanca",
        "Galán",
        "Gámbita",
        "Girón",
        "Guaca",
        "Guadalupe",
        "Guapotá",
        "Guavatá",
        "Güepsa",
        "Hato",
        "Jesús María",
        "Jordán",
        "La Belleza",
        "La Paz",
        "Landázuri",
        "Lebrija",
        "Los Santos",
        "Macaravita",
        "Málaga",
        "Matanza",
        "Mogotes",
        "Molagavita",
        "Ocamonte",
        "Oiba",
        "Onzaga",
        "Palmar",
        "Palmas del Socorro",
        "Páramo",
        "Piedecuesta",
        "Pinchote",
        "Puente Nacional",
        "Puerto Parra",
        "Puerto Wilches",
        "Rionegro",
        "Sabana de Torres",
        "San Andrés",
        "San Benito",
        "San Gil",
        "San Joaquín",
        "San José de Miranda",
        "San Miguel",
        "San Vicente de Chucurí",
        "Santa Bárbara",
        "Santa Helena del Opón",
        "Simacota",
        "Socorro",
        "Suaita",
        "Sucre",
        "Suratá",
        "Tona",
        "Valle de San José",
        "Vélez",
        "Vetas",
        "Villanueva",
        "Zapatoca"
    );
    ?>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <form action="{{ url('/hogaradmin') }}" class="form-card" method="POST" >
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Identif. de su Hogar (Código Recaudo Electrónico - Recibo del Agua)
                                </label>
                                <input type="text" id="id_hogar" name="id_hogar" placeholder="Registre el Id de su Hogar" required>
                                @if($errors->has('id_hogar'))
                                <span class="error text-danger" for="input-id_hogar">{{ $errors->first('id_hogar') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Ciudad
                                </label>
                                <select class="form-select col-sm-8 flex-column d-flex" aria-label="Default select example" id="ciudad" name="ciudad" required>
                                    <option selected>Seleccione una opción</option>
                                    @foreach($miarreglo as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('ciudad'))
                                <span class="error text-danger" for="input-ciudad">{{ $errors->first('ciudad') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                Digite la dirección de su hogar (Domicilio)
                                </label>
                                <input type="text" id="direccion" name="direccion" placeholder="Digite la dirección de su hogar" required>
                                @if($errors->has('direccion'))
                                <span class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Cedula del Usuario
                                </label>
                                <input type="number" id="user_id" name="user_id" value="{{ $hogar->cedula }}" readonly>
                            </div>
                            <!--Invisible-->
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Id del Usuario
                                </label>
                                <input type="number" id="user_id" name="user_id" value="{{ $hogar->id }}" readonly>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Tiene hogar
                                </label>
                                <input type="number" id="tienehogar" name="tienehogar" value="1" readonly>
                            </div>

                            <!--TODO PUNTAJE-->
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Puntos
                                </label>
                                <input type="number" id="puntos" name="puntos" value="0" readonly>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Ultimos Puntos
                                </label>
                                <input type="number" id="puntos_ultimo_reciclado" name="puntos_ultimo_reciclado" value="0" readonly>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Ultimo Peso
                                </label>
                                <input type="number" id="pero_ultimo_reciclado" name="peso_ultimo_reciclado" value="0" readonly>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Total Peso
                                </label>
                                <input type="number" id="total_peso_reciclado" name="total_peso_reciclado" value="0" readonly>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><input type="submit" value="Registrar Hogar"></center>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><a href="{{url('/hogaradmin')}}""><input type="button"  class="btn btn-danger" value="Cancelar"></a></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        jQuery(document).ready(function(){
			// Listen for the input event.
			jQuery("#id_hogar").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
		});
    </script>
</x-app-layout>
