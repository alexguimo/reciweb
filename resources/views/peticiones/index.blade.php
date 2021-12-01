<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peticiones') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                
                <div class="card table-responsive">
                    <div class="btn-group">
                        <br/><a href="{{url('/hogar')}}"><button style="width: 120px;height: 40px;float:left;">Volver</button></a>    
                    </div>
                    Para crear una petición es necesario tener registrado un hogar a nombre del usuario que desea realizar la petición.
                    Especificar una descripción detallada del contenido, color y cantidad de las bolsas para que un administrador pueda confirmar la validez de esta información y continúe con el proceso de recolección.
                    <br/>
                    
                    @if($peticiones->isEmpty())
                        <br/><center><a href="{{ route('peticiones.create') }}"><button style="width: 250px;height: 40px; text-align:center">Crear Petición</button></a></center><br/>
                    @else
                        <br/><center><a href="{{ url('/list') }}"><button style="width: 250px;height: 40px; text-align:center;">Peticiones realizadas</button></a></center>
                    @endif
                    
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Id del Hogar</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Cantidad de Bolsas</th>
                                <th>Descripción de Petición</th>
                                <th>Estado</th>
                                <th>Comentarios de Administrador</th>
                                <th>Puntos</th>
                                <th>Peso(kg)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $peticiones as $peticion )

                            <tr>
                                <td>{{ $peticion->id_hogar }}</td>
                                <td>{{ $peticion->name }}</td>
                                <td>{{ $peticion->direccion }}</td>
                                <td>{{ $peticion->cant_bolsas }}</td>
                                <td>{{ $peticion->peticion }}</td>
                                <td>{{ $peticion->estado_peticion }}</td>
                                <td>{{ $peticion->comentarios }}</td>
                                <td>{{ $peticion->puntospeticiones }}</td>
                                <td>{{ $peticion->pesopeticiones }}</td>
                                <td>
                                    @if($peticion->estado_peticion == 'En espera' || $peticion->estado_peticion == 'Correcciones')
                                        <a href="{{url('/peticiones/'.$peticion->idpeticiones.'/edit')}}" >
                                            <button>Editar Peticion</button>
                                        </a>
                                    @else
                                    @endif
                                    <form action="{{ url('/peticiones/'.$peticion->idpeticiones ) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="form-control btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
