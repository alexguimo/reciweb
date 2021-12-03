<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peticiones Finalizadas') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-1 mx-auto">
        <div class="justify-content">
            <div class="text-center">
                <div class="card">
                    <div class="btn-group">
                        <br/><a href="{{url('/peticiones')}}"><button style="width: 120px;height: 40px;float:left;">Volver</button></a>    
                    </div>
                    Las peticiones realizadas aparecerán en forma de lista basadas en la cronología (la más actual estará en la parte superior de la lista y así sucesivamente). Espero por favor puedas compartir tu experiencia basado en los puntajes que te dan los recolectores, de nuevo una y mil gracias por preferir Reciweb.
                    <br/>
                    
                    <div class="table-responsive" id="no-tabla">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Cantidad de Bolsas</th>
                                    <th>Descripción de Petición</th>
                                    <th>Estado</th>
                                    <th>Comentarios</th>
                                    <th>Puntos</th>
                                    <th>Peso(kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $peticiones as $peticion )

                                <tr>
                                    <td data-title="Cantidad de Bolsas">{{ $peticion->cant_bolsas }}</td>
                                    <td data-title="Descripción de Petición">{{ $peticion->peticion }}</td>
                                    <td data-title="Estado">{{ $peticion->estado_peticion }}</td>
                                    <td data-title="Comentarios">{{ $peticion->comentarios }}</td>
                                    <td data-title="Puntos">{{ $peticion->puntospeticiones }}</td>
                                    <td data-title="Peso(kg)">{{ $peticion->pesopeticiones }}</td>
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
