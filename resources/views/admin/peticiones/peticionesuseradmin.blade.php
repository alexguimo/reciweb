<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peticiones User Específico desde Admin') }}
            @section('title', 'ReciWeb - Peticiones User Específico desde Admin')
        </h2>
    </x-slot>

    <div class="container-fluid px-1 mx-auto">
        <div class="justify-content">
            <div class="text-center">
                <div class="card">
                    <div class="btn-group">
                        <br/><a href="{{url('/hogaradmin')}}"><button style="width: 120px;height: 40px;float:left;">Volver</button></a>    
                    </div>
                    <p>Manejar las peticiónes activas es una responsabilidad muy grande, por ello es menjor manejarse con cuidado dentro de este apartado.
                        Sin embargo el administrador tiene la capacidad de <b>"Actualizar el Estado"</b> de una petición, para hacerle seguimiento a la misma.
                        Puede editar su información o añadirle comentarios a la petición del usuario.
                        <br/><b>Es importante:</b> Una vez finalizada la petición, el administrador se encarga de colocar el puntaje y el peso de las bolsas ya recolectadas.
                    </p>
                    <br/>
                    
                    <!--ID = Hogar_ID-->
                    <div class="btn-group">
                        <br/><center><a href="{{ url('/peticionesadmin/'.$id) }}"><button style="width: 150px;height: 40px; text-align:center">Crear Petición</button></a></center>
                        <center><a href="{{ url('/peticioneslist/'.$id) }}"><button style="width: 120px;height: 40px; text-align:center;">Realizadas</button></a></center>
                    </div>

                    <div class="table-responsive" id="no-tabla">
                        <br/>
                        <table class="table table-light" id="buscador">
                            <thead class="thead-light">
                                <tr>
                                    <th>Identif. Hogar</th>
                                    <th>Nombre</th>
                                    <th>Ciudad</th>
                                    <th>Dirección y Barrio</th>
                                    <th>Cant. Bolsas</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Comentarios</th>
                                    <th>Puntos</th>
                                    <th>Peso (Kg)</th>
                                    <th>Actualizar</th>
                                    <th>Acciónes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $peticiones as $peticion )
                                    @if($peticion->estado_peticion <> 'Finalizada')
                                        <tr>
                                            <td data-title="Identif. Hogar">{{ $peticion->id_hogar }}</td>
                                            <td data-title="Nombre">{{ $peticion->name }}</td>
                                            <td data-title="Dirección/Barrio">{{ $peticion->direccion }}</td>
                                            <td data-title="Cant. Bolsas">{{ $peticion->cant_bolsas }}</td>
                                            <td data-title="Descripción">{{ $peticion->peticion }}</td>
                                            <td data-title="Estado">{{ $peticion->estado_peticion }}</td>
                                            <td data-title="Comentarios">{{ $peticion->comentarios }}</td>
                                            <td data-title="Puntos">{{ $peticion->puntospeticiones }}</td>
                                            <td data-title="Peso (Kg)">{{ $peticion->pesopeticiones }}</td>
                                            <td data-title="Actualizar">
                                                <a href="{{url('/peticionesestado/'.$peticion->idpeticiones)}}" >
                                                    <button>Actualizar Estado</button>
                                                </a>
                                            </td>
                                            <td data-title="Acciónes">
                                                <a href="{{url('/peticionesadmin/'.$peticion->idpeticiones.'/edit')}}" >
                                                    <button>Editar Peticion</button>
                                                </a>
                                                <form action="{{ url('/peticionesadmin/'.$peticion->idpeticiones ) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input class="form-control btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
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
