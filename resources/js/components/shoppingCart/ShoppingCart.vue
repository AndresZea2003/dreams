<script setup>
import { watch, ref } from 'vue';
import { getCartProducts } from '../../use';
import { findIndex } from 'lodash';
import { TrashIcon } from '@heroicons/vue/outline';
import CsrfToken from '../helpers/CsrfToken';

const products = ref(getCartProducts());

const totalQuantity = ref(0);
const totalPrice = ref(0);

const deleteKey = (key) => {
    localStorage.removeItem(key);
    location.replace('http://dreams.test/shop');
};

const change = (product, isAdd) => {
    if (isAdd) product.quantity++;
    else product.quantity--;
    if (!product.quantity) {
        const id = findIndex(products.value, ['id', product.id]);
        products.value.splice(id, 1);
    }
    localStorage.setItem('products', JSON.stringify(products.value));
};

const deleteItem = (product) => {
    const id = findIndex(products.value, ['id', product.id]);
    products.value.splice(id, 1);
    localStorage.setItem('products', JSON.stringify(products.value));
};

const calculateTotals = () => {
    totalQuantity.value = products.value.reduce((prev, current) => prev + current.quantity, 0);
    totalPrice.value = products.value.reduce((prev, current) => prev + current.quantity * current.price, 0);
};

calculateTotals();
watch(products.value, () => calculateTotals());
</script>

<template>
    <div class="container mx-auto">
        <div class="mx-10">
            <p class="font-alatsi text-center text-4xl text-gray-200">Lista de productos agregados al carrito</p>
            <br />
            <div class="mx-60 gap-1 rounded-md bg-gray-700 p-10 text-white drop-shadow-lg">
                <div class="font-alatsi mb-5 flex justify-between border-b-2 border-black px-5 text-2xl">
                    <p>Carrito ( {{ totalQuantity }} products )</p>
                    <button
                        v-if="products != 0"
                        @click="deleteKey('products')"
                        class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 text-sm text-white hover:bg-opacity-90 focus:outline-none"
                    >
                        Eliminar productos del carrito
                    </button>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr v-if="products != 0" class="grid grid-cols-10">
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th class="col-span-3">DESCRIPTION</th>
                                <th>DISPONIBLES</th>
                                <th>PRECIO</th>
                                <th>CANTIDAD</th>
                                <th>TOTAL</th>
                            </tr>
                            <tr v-else>
                                <th class="text-xl font-semibold">Aun no has agregado productos a tu carrito :(</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="grid grid-cols-10 py-2 text-center"
                                v-for="product in products"
                                :key="product.id"
                            >
                                <td class="border-r-2 border-black p-2 font-bold">{{ product.id }}</td>
                                <td class="border-r-2 border-black p-2">{{ product.name }}</td>
                                <td class="col-span-3 border-r-2 border-black p-2">{{ product.description }}</td>
                                <td class="border-r-2 border-black p-2 text-green-300">
                                    Solo {{ product.available }} disponibles
                                </td>
                                <td class="p-2">${{ product.price }} COP</td>
                                <td>
                                    <div class="relative mt-1 flex w-full flex-row rounded-lg bg-transparent">
                                        <button
                                            @click="change(product, false)"
                                            class="cursor-pointer rounded-l bg-gray-300 py-1 px-3 text-gray-600 hover:bg-gray-400 hover:text-gray-700"
                                        >
                                            -
                                        </button>
                                        <span
                                            class="text-md md:text-basecursor-default flex items-center bg-gray-300 py-1 px-3 text-center font-semibold text-gray-700 outline-none hover:text-black focus:text-black"
                                            >{{ product.quantity }}</span
                                        >
                                        <button
                                            @click="change(product, true)"
                                            class="cursor-pointer rounded-r bg-gray-300 py-1 px-3 text-gray-600 hover:bg-gray-400 hover:text-gray-700"
                                        >
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="p-2">
                                    ${{ product.quantity * product.price }}
                                    COP
                                </td>
                                <td>
                                    <button
                                        @click="deleteItem(product)"
                                        class="focus:shadow-outline rounded bg-red-500 p-2 font-bold text-white hover:bg-opacity-90 focus:outline-none"
                                    >
                                        <trash-icon class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="grid grid-cols-8">
                                <td class="col-span-7"></td>
                                <td v-if="products != 0">Total a pagar: ${{ totalPrice }} COP</td>
                                <td class="col-span-6 py-5">
                                    <div>
                                        <button
                                            class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none"
                                        >
                                            <a href="http://dreams.test/products"> Regresar a la tienda </a>
                                        </button>
                                    </div>
                                </td>
                                <td v-if="products != 0" class="col-span-2 py-5">
                                    <div>
                                        <form action="invoices" method="POST" class="text-black">
                                            <csrf-token></csrf-token>
                                            <input
                                                type="text"
                                                name="reference"
                                                :value="Math.floor(Math.random() * (1000000 - 100000)) + 100000"
                                                hidden
                                            />
                                            <input type="number" name="total" :value="totalPrice" hidden />
                                            <input type="text" name="status" value="PENDING" hidden />

                                            <button
                                                type="submit"
                                                class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none"
                                            >
                                                <!--                                                <a href="{{ config('webcheckout.url') }}">-->
                                                <!--                                                </a>-->
                                                Continuar con el pago
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
