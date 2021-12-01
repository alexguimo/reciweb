<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peticiones Finalizadas') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                
                <div class="card table-responsive">
                    <div class="btn-group">
                        <br/><a href="{{url('/peticiones')}}"><button style="width: 120px;height: 40px;float:left;">Volver</button></a>    
                    </div>
                    Las peticiones realizadas aparecerán en forma de lista basadas en la cronología (la más actual estará en la parte superior de la lista y así sucesivamente). Espero por favor puedas compartir tu experiencia basado en los puntajes que te dan los recolectores, de nuevo una y mil gracias por preferir Reciweb.
                    <br/>
                    
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Id Peticiones</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Id del Hogar</th>
                                <th>Dirección</th>
                                <th>Cantidad de Bolsas</th>
                                <th>Descripción de Petición</th>
                                <th>Estado</th>
                                <th>Comentarios de Administrador</th>
                                <th>Puntos</th>
                                <th>Peso(kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $peticiones as $peticion )

                            <tr>
                                <td>{{ $peticion->idpeticiones }}</td>
                                <td>{{ $peticion->name }}</td>
                                <td>{{ $peticion->cedula }}</td>
                                <td>{{ $peticion->id_hogar }}</td>
                                <td>{{ $peticion->direccion }}</td>
                                <td>{{ $peticion->cant_bolsas }}</td>
                                <td>{{ $peticion->peticion }}</td>
                                <td>{{ $peticion->estado_peticion }}</td>
                                <td>{{ $peticion->comentarios }}</td>
                                <td>{{ $peticion->puntospeticiones }}</td>
                                <td>{{ $peticion->pesopeticiones }}</td>
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
