<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Hogar desde Admin') }}
            @section('title', 'ReciWeb - Editar Hogar desde Admin')

        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <form action="{{ url('/hogaradmin/'.$hogar->idhogar) }}" class="form-card" method="POST" >
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Registre el Id de su Hogar<br>(No puede ser igual al anterior en caso de querer cambiarlo)
                                </label>
                                <input type="text" id="id_hogar" name="id_hogar" placeholder="Registre el Id de su Hogar" value="{{ old('id_hogar', $hogar->id_hogar) }}" required>
                                @if($errors->has('id_hogar'))
                                <span class="error text-danger" for="input-id_hogar">{{ $errors->first('id_hogar') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                Digite la dirección de su hogar (Domicilio)
                                </label>
                                <input type="text" id="direccion" name="direccion" placeholder="Digite la dirección de su hogar" value="{{ old('direccion', $hogar->direccion) }}" required>
                                @if($errors->has('direccion'))
                                <span class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Cedula del Usuario
                                </label>
                                <input type="text" value="{{ $hogar->cedula }}" readonly disabled>
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Id del Usuario
                                </label>
                                <input type="number" id="user_id" name="user_id" value="{{ $hogar->user_id }}" readonly>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><input type="submit" value="Guardar Cambios e ir a Lista de Hogares"></center>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><a href="{{url('/admin')}}""><input type="button"  class="btn btn-danger" value="Cancelar"></a></center>
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
