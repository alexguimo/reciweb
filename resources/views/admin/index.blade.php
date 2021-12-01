<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios desde Admin') }}
            @section('title', 'ReciWeb - Lista de Usuarios desde Admin')
        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                
                <div class="card table-responsive">
                <div class="btn-group">
                <a href="{{ route('dashboard') }}"><button style="width: 150px;height: 40px; float:left;">Volver</button></a>
                </div>
                    Esta es la visualización del administrador dentro de ReciWeb. Dentro de este lugar se podrán crear usuarios, editar sus hogares y modificar el estado de sus peticiónes. Trabaja con cuidado y todo saldrá bien.
                    <div class="btn-group">
                    <a href="{{ route('register') }}"><button style="width: 150px;height: 40px; float:left;">Crear Usuario</button></a>
                        <a href="{{url('/hogaradmin')}}"><button style="width: 150px;height: 40px; float:left;">Ver Hogares</button></a>
                    </div>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Hogar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $usuarios as $user )
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->cedula }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->tienehogar == 0)
                                    <a href="{{ url('/hogaradmin/'.$user->id) }}" >
                                        <button>Crear Hogar</button>
                                    </a>
                                    @else
                                    <a href="{{url('/hogaradmin/'.$user->id.'/edit')}}" >
                                        <button>Editar Hogar</button>
                                    </a>
                                    <form action="{{ url('/hogaradmin/'.$user->id ) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="button btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar Hogar">
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/admin/'.$user->id.'/edit')}}" >
                                        <button>Editar Usuario</button>
                                    </a>
                                    <form action="{{ url('/admin/'.$user->id ) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="button btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar Usuario">
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
