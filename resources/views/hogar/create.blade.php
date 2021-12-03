<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Hogar') }}
            @section('title', 'ReciWeb - Crear Hogar de Usuario')
        </h2>
    </x-slot>

    <div class="container-fluid px-1 mx-auto">
        <div class="d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <form action="{{ url('/hogar') }}" class="form-card" method="POST" >
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Registre el Id de su Hogar
                                </label>
                                <input type="text" id="id_hogar" name="id_hogar" placeholder="Registre el Id de su Hogar">
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                Digite la dirección de su hogar (Domicilio)
                                </label>
                                <input type="text" id="direccion" name="direccion" placeholder="Digite la dirección de su hogar">
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Cedula del Usuario
                                </label>
                                <input type="number" value="{{ Auth::user()->cedula }}" readonly disabled>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Id del Usuario
                                </label>
                                <input type="number" id="user_id" name="user_id" value="{{ Auth::user()->id }}" readonly>
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
                                <center><a href="{{url('/hogar')}}""><input type="button"  class="btn btn-danger" value="Cancelar"></a></center>
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
