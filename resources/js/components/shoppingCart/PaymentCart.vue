<script setup>
import { ref } from 'vue';
import CsrfToken from '../helpers/CsrfToken';
import {
    RefreshIcon,
    SparklesIcon,
    ShoppingBagIcon,
    UserCircleIcon,
    BookOpenIcon,
    ReplyIcon,
    EyeIcon,
} from '@heroicons/vue/solid';
import { QuestionMarkCircleIcon, CheckCircleIcon, XCircleIcon } from '@heroicons/vue/outline';

const props = defineProps({
    payment: { type: String, required: true },
});

const payment = ref(JSON.parse(props.payment));

console.log(payment.value);
</script>
<template>
    <div class="grid grid-cols-2">
        <div class="rounded-md bg-gray-300 p-5 shadow-2xl">
            <div class="h-full bg-gray-400 p-10">
                <div class="flex justify-center">
                    <a
                        href="{{ route('home') }}"
                        class="font-fugaz-one pt-2 pb-10 text-6xl text-gray-200 hover:text-gray-800"
                    >
                        <div class="flex">
                            Dreams
                            <SparklesIcon class="mt-5 h-6 w-6" aria-hidden="true" />
                        </div>
                    </a>
                </div>
                <div class="mt-5">
                    <div class="mt-2 flex justify-center">
                        <a href="http://dreams.test/payments">
                            <button
                                class="focus:shadow-outline flex rounded bg-zinc-500 py-2 px-4 font-bold text-white hover:bg-zinc-800 focus:outline-none"
                            >
                                <BookOpenIcon class="h-6 w-6" aria-hidden="true" />
                                <span class="ml-2">Historial de compras</span>
                            </button>
                        </a>
                    </div>
                    <div class="mt-2 flex justify-center">
                        <a href="http://dreams.test/products">
                            <button
                                class="focus:shadow-outline mt-2 flex rounded bg-zinc-500 py-2 px-4 font-bold text-white hover:bg-zinc-800 focus:outline-none"
                            >
                                <ShoppingBagIcon class="h-6 w-6" aria-hidden="true" />
                                <span class="ml-2">Tienda</span>
                            </button>
                        </a>
                    </div>
                    <div class="mt-2 flex justify-center">
                        <a href="http://dreams.test/profile">
                            <button
                                class="focus:shadow-outline mt-2 flex rounded bg-zinc-500 py-2 px-4 font-bold text-white hover:bg-zinc-800 focus:outline-none"
                            >
                                <UserCircleIcon class="h-6 w-6" aria-hidden="true" />
                                <span class="ml-2">Tu perfil</span>
                            </button>
                        </a>
                    </div>
                    <div v-if="payment.status === 'PENDING'" class="mt-20">
                        <p class="font-alatsi text-xl">
                            <span>Uy! parece que tu pago esta pendiente,</span><br />
                            <span>quiere continuar el proceso de compra?</span>
                        </p>
                        <div class="mt-5 flex justify-center">
                            <form :action="`http://dreams.test/payments/${payment.id}/try-payment`" method="post">
                                <csrf-token></csrf-token>
                                <div class="flex">
                                    <button
                                        v-if="payment.status === 'PENDING'"
                                        type="submit"
                                        class="focus:shadow-outline flex rounded bg-zinc-500 py-2 px-4 font-bold text-white hover:bg-zinc-800 focus:outline-none"
                                    >
                                        <ReplyIcon class="h-5 w-5" aria-hidden="true" />
                                        Reintetar el pago
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mt-2 flex justify-center">
                            <QuestionMarkCircleIcon class="h-16 w-16 text-yellow-200" aria-hidden="true" />
                        </div>
                    </div>
                    <div v-if="payment.status === 'APPROVED'" class="mt-20 flex flex-col items-center">
                        <CheckCircleIcon class="h-16 w-16 text-green-700" aria-hidden="true" />
                        <span class="font-alatsi text-green-700">Felicidades! Tu pago se realiza correctamente</span>
                        <div class="mt-5 flex">
                            <a :href="payment.process_url">
                                <button
                                    class="focus:shadow-outline flex rounded bg-zinc-500 py-2 px-4 font-bold text-white hover:bg-zinc-800 focus:outline-none"
                                >
                                    <EyeIcon class="mt-1 mr-2 h-5 w-5" aria-hidden="true" />
                                    Ver en PlaceToPay
                                </button>
                            </a>
                        </div>
                    </div>
                    <div v-if="payment.status === 'REJECTED'" class="mt-20 flex flex-col items-center">
                        <XCircleIcon class="h-16 w-16 text-red-600" aria-hidden="true" />
                        <span class="font-alatsi text-red-700">Lo sentimos, tu pago ha sido rechazado :(</span>
                        <div class="mt-5 flex">
                            <a :href="payment.process_url">
                                <button
                                    class="focus:shadow-outline flex rounded bg-zinc-500 py-2 px-4 font-bold text-white hover:bg-zinc-800 focus:outline-none"
                                >
                                    <EyeIcon class="mt-1 mr-2 h-5 w-5" aria-hidden="true" />
                                    Ver en PlaceToPay
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-md bg-gray-300 p-5 shadow-2xl">
            <div class="bg-gray-400 p-10">
                <p class="text-center text-xl">
                    <span v-if="payment.status === 'APPROVED'" class="text-center text-3xl font-bold text-green-200"
                        >PAGO APROVADO</span
                    ><br />
                    <span v-if="payment.status === 'PENDING'" class="text-center text-3xl font-bold text-yellow-200"
                        >PAGO PENDIENTE</span
                    ><br />
                    <span v-if="payment.status === 'REJECTED'" class="text-center text-3xl font-bold text-red-600"
                        >PAGO RECHAZADO</span
                    ><br />
                    <span></span><br />
                    <span class="font-semibold">Factura #{{ payment.invoice_id }}</span
                    ><br />
                    <span></span><br />
                    <span class="font-semibold">Numero de referencia: </span><br />
                    <span>#{{ payment.reference }}</span
                    ><br />
                    <span></span><br />
                    <span class="font-semibold">Descripcion de la compra: </span><br />
                    <span>{{ payment.description }}</span
                    ><br />
                    <span></span><br />
                    <span class="font-semibold">ID de la session:</span><br />
                    <span>{{ payment.request_id }}</span
                    ><br />
                    <span></span><br />
                    <span class="font-semibold">Precio total: </span><br />
                    <span>{{ payment.amount }}</span
                    ><br />
                </p>
                <div class="mt-5 flex justify-center">
                    <form :action="`http://dreams.test/payments/${payment.id}`" method="POST">
                        <csrf-token></csrf-token>
                        <input type="hidden" name="_method" value="PATCH" />
                        <button
                            type="submit"
                            class="focus:shadow-outline rounded bg-zinc-500 py-2 px-4 font-bold text-white hover:bg-zinc-800 focus:outline-none"
                        >
                            <RefreshIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
