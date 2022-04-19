<script setup>
import { ref } from 'vue';
import CsrfToken from '../helpers/CsrfToken';
import { ArrowCircleLeftIcon } from '@heroicons/vue/outline';

const props = defineProps({
    invoice: { type: String, required: true },
    user_id: { type: String, required: true },
    user: { type: String, required: true },
});

const user = ref(JSON.parse(props.user));
console.log(user.value);

const invoce = ref(JSON.parse(props.invoice));
const id = invoce.value.id;
const reference = invoce.value.reference;
const quantity_products = invoce.value.quantity_products;
const status = invoce.value.status;
const total = invoce.value.total;
const description = `INVOICE #${id}, purchase of ${quantity_products} products`;

// const items = ref(trim(JSON.stringify(getCartProducts(id)),'[]'))

const items = JSON.parse(localStorage.getItem(`products${props.user_id}`));

// const cart = ref(JSON.parse(items))

console.log(items);
</script>

<template>
    <div class="h-screen bg-zinc-400">
        <div class="grid h-full grid-cols-2">
            <div class="flex items-center justify-end">
                <div class="rounded-md bg-gray-200 px-10 py-5 shadow-2xl">
                    <div>
                        <span class="text-2xl font-bold">Tus productos</span>
                        <table class="my-5">
                            <tbody class="border-y-2 border-black">
                                <tr v-for="item in items" class="border-b border-gray-400">
                                    <td class="flex justify-center py-4">
                                        <div>
                                            <img
                                                class="h-12 w-12 rounded-full"
                                                src="https://ebani.com.co/wp-content/uploads/2021/08/Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit-1-Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit.jpg"
                                                :alt="`imagen del producto ${item.id}`"
                                            />
                                        </div>
                                    </td>
                                    <td class="font-alatsi p-4 text-xl">{{ item.name }}</td>
                                    <td class="p-4">
                                        Cantidad: <span class="font-bold">{{ item.quantity }}</span>
                                    </td>
                                    <td class="p-4 font-bold">${{ item.price }} COP</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="grid grid-cols-2">
                            <p class="col-span-2 font-bold">Mas informacion</p>
                            <p class="py-2 font-bold">Factura #{{ id }}</p>
                            <p><span class="font-bold">Numero de referencia:</span><br />#{{ reference }}</p>
                            <p class="col-span-2"><span class="font-bold">Descripcion:</span><br />{{ description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex h-full justify-center">
                <div class="h-full bg-gray-200">
                    <div class="flex h-full flex-col justify-center text-center">
                        <div class="mx-10 flex flex-col items-center pb-10">
                            <span class="font-fugaz-one mb-10 text-6xl text-gray-400">Dreams</span>
                            <img
                                class="h-16 w-16 rounded-full"
                                :src="`https://ui-avatars.com/api/?name=${user.name}&background=eed09d&color=000&size=50&bold=true`"
                                alt="Avatar"
                            />
                            <p class="py-2 font-bold">{{ user.name }}</p>
                            <p class="font-bold">{{ user.email }}</p>
                        </div>

                        <p class="px-10 text-left text-xl font-bold">Resumen de compra</p>
                        <div class="mx-10 border-t-2 border-gray-400 py-5 text-center">
                            <p class="flex justify-between">
                                <span>Productos:</span>
                                <span>{{ quantity_products }}</span>
                            </p>
                        </div>

                        <div class="mx-10 border-t-2 border-gray-400 pt-5 text-center">
                            <p class="flex justify-between">
                                <span>Total a pagar:</span>
                                <span class="font-bold">${{ total }} COP</span>
                            </p>
                        </div>
                        <div class="mx-48"></div>

                        <div class="mt-5 flex flex-col justify-center">
                            <form action="http://dreams.test/payments" method="post">
                                <csrf-token></csrf-token>
                                <input type="text" :value="reference" name="reference" hidden />
                                <input type="text" :value="description" name="description" hidden />
                                <input type="number" :value="id" name="invoice_id" hidden />
                                <input type="number" :value="total" name="amount" hidden />
                                <div class="flex flex-col items-center">
                                    <button
                                        type="submit"
                                        class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none"
                                    >
                                        Paga con PlaceToPay
                                    </button>
                                </div>
                            </form>

                            <div>
                                <a href="http://dreams.test/shop">
                                    <button
                                        class="focus:shadow-outline mt-2 rounded bg-zinc-800 py-1 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none"
                                    >
                                        <ArrowCircleLeftIcon class="h-6 w-6" aria-hidden="true" />
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    <div class="bg-gray-200 h-full w-full" >-->

    <!--    <div class="bg-zinc-900">-->
    <!--        <nav class="container mx-auto px-5 py-2 flex grid grid-cols-3">-->
    <!--            <div class="col-span-2">-->
    <!--            <a href="{{ route('home') }}" class="font-fugaz-one text-gray-400 hover:text-white text-4xl">Dreams</a>-->
    <!--            </div>-->
    <!--            <div class="text-right">-->
    <!--            <dropdown name='{{ auth()->user()->name }}' profile-route="{{ route('profile') }}" products-route="{{ route('products.index') }}" payments-route="{{ route('payments.index') }}" panel-route="{{ auth()->user()->hasRole('admin') ? route('panel') : null }}"></dropdown>-->
    <!--            </div>-->

    <!--        </nav>-->
    <!--    </div>-->

    <!--        <div class="bg-red-200">-->
    <!--            dad-->
    <!--        </div>-->
    <!--&lt;!&ndash;<span class="text-3xl">{{ status }} PAYMENT</span>&ndash;&gt;-->

    <!--    <div class="bg-gray-300 p-10 rounded-md shadow-md grid grid-cols-2 gap-5">-->

    <!--        <div class="bg-gray-400">-->
    <!--            <div class="p-10 font-bold text-center">-->
    <!--                <p class="text-3xl">Invoice</p>-->
    <!--    &lt;!&ndash;            <p>{{ $invoice }}</p>&ndash;&gt;-->
    <!--                <p>Invoice id: {{ id }}</p>-->
    <!--                <p>reference: #{{ reference }}</p>-->
    <!--    &lt;!&ndash;            <p>quantity_proudcts: {{ quantity_products }}</p>&ndash;&gt;-->
    <!--                <p>status: {{ status }}</p>-->
    <!--                <p>Total: ${{ total }} COP</p><br>-->
    <!--                <p class="bg-gray-200">{{ description }}</p>-->
    <!--            </div>-->

    <!--        </div>-->

    <!--        <div class="bg-gray-400">-->
    <!--            <div>-->
    <!--                {{ user.name }}-->
    <!--                {{ items }}-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="col-span-2">-->
    <!--            <form action="http://dreams.test/payments" method="post">-->
    <!--                <csrf-token></csrf-token>-->
    <!--                <input type="text" :value="reference" name="reference" hidden>-->
    <!--                <input type="text" :value="description" name="description" hidden>-->
    <!--                <input type="number" :value="id" name="invoice_id" hidden>-->
    <!--                <input type="number" :value="total" name="amount" hidden>-->
    <!--                <div class="flex justify-between">-->

    <!--                    <button class="focus:shadow-outline rounded bg-zinc-800 mr-20 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none">-->
    <!--                        <a href="http://dreams.test/shop">-->
    <!--                            Regresar-->
    <!--                        </a>-->
    <!--                    </button>-->
    <!--                    <button type="submit" class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none">-->
    <!--                        Paga con PlaceToPay-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--            </form>-->

    <!--            </div>-->
    <!--    </div>-->
    <!--</div>-->
</template>
