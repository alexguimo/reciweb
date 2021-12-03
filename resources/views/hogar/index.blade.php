<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hogar') }}
            @section('title', 'ReciWeb - Hogar de Usuario')
        </h2>
    </x-slot>

    <div class="container-fluid px-1 mx-auto">
        <div class="justify-content">
            <div class="text-center">
                <div class="card">
                    <div class="btn-group">
                        <br/><a href="{{url('/dashboard')}}"><button style="width: 120px;height: 40px;float:left;">Volver</button></a>
                    </div>
                    <br/>
                    <div class="table-responsive" id="no-tabla">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Últimos Puntos Registrados</th>
                                    <th>Último Peso Registrado</th>
                                    <th>Total Puntos</th>
                                    <th>Total Peso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $hogares as $hogar )
                                <tr>
                                    <td data-title="Últimos Puntos Registrados">{{ $hogar->puntos_ultimo_reciclado }}</td>
                                    <td data-title="Último Peso Registrado">{{ $hogar->peso_ultimo_reciclado }}</td>
                                    <td data-title="Total Puntos">{{ $hogar->puntos }}</td>
                                    <td data-title="Total Peso">{{ $hogar->total_peso_reciclado }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <br/>
                    Dentro de este apartado, podrás realizar la creación de un hogar a tu nombre. Quedará registrado con tu número de cédula y podrá editar solamente la información de Dirección y la identificación de su hogar. Sin embargo, solo podrá tener a un hogar registrado con su número de cédula.

                    @if($hogares->isEmpty())
                        <br/><center><a href="{{url('/hogar/create')}}"><button style="width: 150px;height: 40px; text-align:center;">Crear Hogar</button></a></center><br/>
                    @else
                        <br/><center><a href="{{url('/peticiones')}}"><button style="width: 150px;height: 40px; text-align:center;">Peticiones</button></a></center><br/>
                    @endif

                    <div class="table-responsive" id="no-tabla">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Identificador del Hogar</th>
                                    <th>Dirección Actual</th>
                                    <th>Cedula</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $hogares as $hogar )
                                <tr>
                                    <td data-title="Identificador del Hogar">{{ $hogar->id_hogar }}</td>
                                    <td data-title="Dirección Actual">{{ $hogar->direccion }}</td>
                                    <td data-title="Cedula">{{ $hogar->cedula}}</td>
                                    <td data-title="Acciones">
                                        <a href="{{url('/hogar/'.$hogar->idhogar.'/edit')}}" >
                                            <button>Editar Hogar</button>
                                        </a>
                                        <form action="{{ url('/hogar/'.$hogar->idhogar ) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <center><input class="form-control" type="submit" style="width: 120px;height: 40px;" onclick="return confirm('¿Quieres borrar?')" value="Eliminar"></center>
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
