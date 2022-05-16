@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center pt-10 gap-5 bg-neutral-400">
            <div>
                <div class="bg-gray-300 p-10 shadow-2xl rounded-md grid grid-cols-2 gap-5">
                    <span class="col-span-2 flex justify-center font-bold text-3xl">REPORTES ACERCA DEL SITIO</span>
                    <div class="bg-sky-400 rounded-md shadow-2xl p-5">
                        <div class="flex justify-center text-xl">
                            <div class="flex flex-col grid grid-cols-4">
                                <span class="flex justify-center text-2xl font-bold pb-2 col-span-4">Pagos</span>
                                <div class="flex flex-col col-span-3">
                                    <span class="font-bold">Procesos de pagos realizados:</span>
                                    <span class="font-bold">Pagos aprovados:</span>
                                    <span class="font-bold">Pagos pendientes:</span>
                                    <span class="font-bold">Pagos rechazados:</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span>{{ $paymentsCount }}</span>
                                    <span>{{ $paymentsApproved }}</span>
                                    <span>{{ $paymentsPending }}</span>
                                    <span>{{ $paymentsRejected }}</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="bg-red-400 rounded-md shadow-2xl p-5">
                        <div class="flex justify-center text-xl">
                            <div class="flex flex-col grid grid-cols-4">
                                <span class="flex justify-center text-2xl col-span-4 font-bold pb-2">Usuarios</span>
                                <div class="flex flex-col col-span-3">
                                    <span class="font-bold">Usuarios actuales:</span>

                                    <span class="font-bold">Usuarios desahabilitados actualmente:</span>
                                    <span class="font-bold">Usuarios verificados actualmente:</span>
                                    <span class="font-bold">Usuario creado mas reciente:</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span>{{ $usersCount }}</span>
                                    <span>{{ $usersDisabled }}</span>
                                    <span>{{ $usersVerified }}</span>
                                    <report-users users="{{ $users }}"></report-users>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-emerald-400 rounded-md shadow-2xl p-5">
                        <div class="flex justify-center text-xl">
                            <div class="flex flex-col grid grid-cols-4">

                                <span class="flex justify-center text-2xl col-span-4 font-bold pb-2">Productos</span>
                                <div class="flex flex-col col-span-3">
                                    <span class="font-bold">Productos actuales:</span>
                                    <span class="font-bold">Productos desahabilitados actualmente:</span>
                                    <span class="font-bold">Producto creado mas reciente:</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span>{{ $productsCount }}</span>
                                    <span>{{ $productsDisabled }}</span>
                                    <report-products
                                        products="{{ $products }}"></report-products>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
