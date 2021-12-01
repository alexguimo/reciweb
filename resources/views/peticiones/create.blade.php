<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Peticion') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <form action="{{ url('/peticiones') }}" class="form-card" method="POST" >
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Cantidad de Bolsas
                                </label>
                                <input type="number" id="cant_bolsas" name="cant_bolsas" placeholder="Digite la cantidad de bolsas de esta petición." required>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Descripción breve de su petición
                                </label>
                                <textarea class="form-control" style="text-align:justify;" id="peticion" name="peticion" rows="4" placeholder="En este campo realize una breve descripción indicando el COLOR de las bolsas, su CONTENIDO y el TAMAÑO de las mismas. Por favor y gracias." required></textarea>
                            </div>

                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Estado de Peticion
                                </label>
                                <input type="text" id="estado_peticion" name="estado_peticion" value="En espera"required>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Comentarios
                                </label>
                                <input type="text" id="comentarios" name="comentarios" value="A la espera de confirmación."required>
                            </div>

                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Puntos
                                </label>
                                <input type="text" id="puntospeticiones" name="puntospeticiones" value="0">
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Peso
                                </label>
                                <input type="text" id="pesopeticiones" name="pesopeticiones" value="0">
                            </div>

                            @foreach( $peticiones as $peticion )
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Id del Hogar
                                </label>
                                <input type="number" id="hogar_id" name="hogar_id" value="{{ $peticion->idhogar }}" readonly>
                            </div>
                            @endforeach
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><input type="submit" value="Registrar Peticion"></center>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><a href="{{url('/peticiones')}}""><input type="button"  class="btn btn-danger" value="Cancelar"></a></center>
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
</x-app-layout>
