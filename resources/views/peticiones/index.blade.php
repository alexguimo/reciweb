<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peticiones') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-1 mx-auto">
        <div class="justify-content">
            <div class="text-center">
                <div class="card">
                    <div class="btn-group">
                        <br/><a href="{{url('/hogar')}}"><button style="width: 120px;height: 40px;float:left;">Volver</button></a>    
                    </div>
                    Para crear una petición es necesario tener registrado un hogar a nombre del usuario que desea realizar la petición.
                    Especificar una descripción detallada del contenido, color y cantidad de las bolsas para que un administrador pueda confirmar la validez de esta información y continúe con el proceso de recolección.
                    <br/>
                    
                    <div class="btn-group">
                        @if($peticiones->isEmpty())
                            <br/><center><a href="{{ route('peticiones.create') }}"><button style="width: 150px;height: 40px; text-align:center">Crear Petición</button></a></center><br/>
                        @endif
                            <br/><center><a href="{{ url('/list') }}"><button style="width: 120px;height: 40px; text-align:center;">Realizadas</button></a></center>
                    </div>
                    
                    <div class="table-responsive" id="no-tabla">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Cant. Bolsas</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Comentarios</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $peticiones as $peticion )
                                <tr>
                                    <td data-title="Cant. Bolsas">{{ $peticion->cant_bolsas }}</td>
                                    <td data-title="Descripción">{{ $peticion->peticion }}</td>
                                    <td data-title="Estado">{{ $peticion->estado_peticion }}</td>
                                    <td data-title="Comentarios">{{ $peticion->comentarios }}</td>
                                    <td data-title="Acciones">
                                        @if($peticion->estado_peticion == 'En espera' || $peticion->estado_peticion == 'Correcciones')
                                            <a href="{{url('/peticiones/'.$peticion->idpeticiones.'/edit')}}" >
                                                <button>Editar Peticion</button>
                                            </a>
                                        @endif
                                        <form action="{{ url('/peticiones/'.$peticion->idpeticiones ) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <center><input class="form-control btn-danger" style="width: 120px;" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar"></center>
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
        /*TABLA RESPONSIVE*/
        @media only screen and (max-width:800px){
            #no-tabla tbody,
            #no-tabla tr,
            #no-tabla td {
                display: block;
            }
            #no-tabla thead tr{
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            #no-tabla td{
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }
            #no-tabla td:before{
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
            }
            #no-tabla tr{
                border-bottom: 3px solid #ccc;
            }
        }
    </style>
</x-app-layout>
