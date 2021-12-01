<div class="p-6 sm:px-20 bg-white border-b border-gray-200">


    <div class="mt-8 text-2xl">
        Bienvenid@ {{ Auth::user()->name }}!
    </div>

    <div class="mt-8 text-">
        <p>¿Quieres ver toda la información de tu hogar? <b style="text-decoration: underline;"><a href="{{url('/hogar')}}">Clic aquí</a></b></p>
    </div>

    <div class="mt-6 text-gray-500" style="text-align: justify">
        <p>Recuerde que para aumentar el puntaje de su hogar, 
            deberá realizar una petición en el apartado de <b>peticiones</b> dentro de su <b style="text-decoration: underline;"><a href="{{url('/hogar')}}">HOGAR</a></b> ya previamente creado. 
            Con esto, los encargados de la recolección estarán al pentiende 
            para realizar la confirmación o negación de dicha petición, 
            y a su vez para continuar o corregir el proceso de recolección.</p>
            <br/><center><a href="{{url('/hogar')}}"><button class="btn btn-light" type="button" style="width: 150px;height: 40px; text-align:center;">Ver Hogar</button></a></center><br/>

    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 sm:px-20">

        <div class="ml-12">
            <div class="mt-2 text- text-gray-500">
                ¡Gracias por preferir ReciWeb!
            </div>
        </div>
</div>
