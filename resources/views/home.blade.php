@extends('Layouts.dashboard')

@section('content')
    <div class="container mx-auto flex justify-center h-full bg-gray-900 mt-60">

        <div class="bg-pink-900 rounded-md text-gray-300 p-5 grid grid-cols-2 gap-2">
            <div>
                <p class="text-3xl font-bold text-white">Se agrego:</p>
                <p>- Nuevos logs para el modelo de los productos</p>
                <p>- Nuevo diseño a la vitrina</p>
                <p>- Interfaz para visualizar cada producto en especifico</p>
                <p>- Limpieza de codigo </p>
            </div>
            <div>
                <br><p>- Se integro la Api de Crear session de webcheckout</p>
                    <p>- Se integro la Api de Consultar session de webcheckout</p>
            </div>


        </div>

    </div>
@endsection
