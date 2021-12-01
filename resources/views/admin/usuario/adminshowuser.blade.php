<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario desde Admin') }}
            @section('title', 'ReciWeb - Editar Usuario desde Admin')

        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <form action="{{ url('/admin/'.$usuario->id) }}" class="form-card" method="POST" >
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Nombre del Usuario
                                </label>
                                <input type="text" id="name" name="name" placeholder="Digite elnombre del usuario" value="{{ old('name', $usuario->name) }}" autofocus required>
                                @if($errors->has('name'))
                                <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                Cedula
                                </label>
                                <input type="text" id="cedula" name="cedula" placeholder="Digite la cedula del Usuario" value="{{ old('cedula', $usuario->cedula) }}" required>
                                @if($errors->has('cedula'))
                                <span class="error text-danger" for="input-cedula">{{ $errors->first('cedula') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                Correo Electrónico
                                </label>
                                <input type="email" id="email" name="email" placeholder="Digite el correo electrónico del usuario" value="{{ $usuario->email }}" required>
                                @if($errors->has('email'))
                                <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                @endif
                                <br/>
                            </div>
                            <hr>
                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label class="form-control-label px-3">
                                Cambiar contraseña
                                </label>
                                <input type="password" id="password" name="password" placeholder="Rellene este campo si la desea modificar.">
                                @if($errors->has('password'))
                                <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8 flex-column d-flex d-none">
                                <label class="form-control-label px-3">
                                    Id del Usuario
                                </label>
                                <input type="number" id="id" name="id" value="{{ $usuario->id }}" readonly>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <center><input type="submit" value="Actualizar Usuario"></center>
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

