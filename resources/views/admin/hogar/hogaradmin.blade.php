<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hogares desde Administrador') }}
            @section('title', 'ReciWeb - Hogares desde Administrador')

        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                
                <div class="card table-responsive">
                    <div class="btn-group">
                        <br/><a href="{{url('/admin')}}"><button style="width: 120px;height: 40px;float:left;">Volver</button></a>
                    </div><br/>
                    <p>La lista de hogares que se presenta a continuación, son los hogares creados por los usuarios. Podrás <b>"Ver sus Peticiones"</b> por cada hogar, o en el botón de <b>"Peticiones desde Admin"</b> para ver una lista de todas las peticiónes en tránsito que existen actualmente.</p>
                    <div class="btn-group">
                        <!--<br/><center><a href="{{route('hogaradmin.create')}}"><button style="width: 250px;height: 40px; text-align:center;">Crear Hogar desde Admin</button></a></center>-->
                        <center><a href="{{ url('/peticionesadmin')}}"><button style="width: 250px;height: 40px; text-align:center;">Peticiones desde Admin</button></a></center><br/>
                    </div>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Id del Hogar</th>
                                <th>Dirección Actual</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Últimos Puntos</th>
                                <th>Último Peso</th>
                                <th>Total Puntos Registrados</th>
                                <th>Total Peso Registrado</th>
                                <th>Peticiones</th>
                                <!--<th>Acciones</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $hogares as $hogar )
                            <tr>
                                <td>{{ $hogar->id_hogar }}</td>
                                <td>{{ $hogar->direccion }}</td>
                                <td>{{ $hogar->name}}</td>
                                <td>{{ $hogar->cedula}}</td>
                                <td>{{ $hogar->puntos_ultimo_reciclado }}</td>
                                <td>{{ $hogar->peso_ultimo_reciclado }}</td>
                                <td>{{ $hogar->puntos }}</td>
                                <td>{{ $hogar->total_peso_reciclado }}</td>
                                <td>
                                    <a href="{{ url('/peticionesuser/'.$hogar->idhogar)}}" >
                                        <button>Ver Peticiones</button>
                                    </a>
                                </td>
                                <!--<td>
                                    <a href="{{ url('/hogaradmin/'.$hogar->idhogar.'/edit') }}" >
                                        <button>Editar</button>
                                    </a>
                                    <form action="{{ url('/hogaradmin/'.$hogar->idhogar ) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="form-control" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                                    </form>
                                </td>-->
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
