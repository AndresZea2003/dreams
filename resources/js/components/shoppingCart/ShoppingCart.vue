<script setup>
import { watch, ref } from 'vue'
import { getCartProducts } from '../../use'
import { findIndex } from 'lodash';
import { TrashIcon } from '@heroicons/vue/outline';

const products = ref(getCartProducts())

const totalQuantity = ref(0);
const totalPrice = ref(0);

const deleteKey = (key) => {
    localStorage.removeItem(key)
    location.replace('http://dreams.test/shop')
}

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
    }


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
            <p class="text-center font-alatsi text-4xl text-gray-200">Lista de productos agregados al carrito</p><br>
            <div class="bg-gray-700 text-white mx-60 p-10 gap-1 rounded-md drop-shadow-lg">

                <div class="mb-5 px-5 font-alatsi text-2xl border-b-2 border-black flex justify-between">
                    <p>Carrito ( {{ totalQuantity }} products )</p>
                    <button v-if="products != 0" @click="deleteKey('products')" class="bg-zinc-800 hover:bg-opacity-90 text-white py-2 px-4 text-sm rounded focus:outline-none focus:shadow-outline">
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
                            <tr class="grid grid-cols-10 text-center py-2" v-for="product in products" :key="product.id">
                                <td class="p-2 border-black border-r-2 font-bold">{{ product.id }}</td>
                                <td class="p-2 border-black border-r-2">{{ product.name }}</td>
                                <td class="col-span-3 p-2 border-black border-r-2">{{ product.description }}</td>
                                <td class="p-2 border-black border-r-2 text-green-300">Solo {{ product.available }} disponibles</td>
                                <td class="p-2">${{ product.price }} COP</td>
                                <td>
                                    <div class="flex flex-row w-full rounded-lg relative bg-transparent mt-1">
                                        <button @click="change(product, false)" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 py-1 px-3 rounded-l cursor-pointer">-</button>
                                        <span class="text-center bg-gray-300 font-semibold text-md hover:text-black focus:text-black py-1 px-3 md:text-basecursor-default flex items-center text-gray-700 outline-none">{{ product.quantity }}</span>
                                        <button @click="change(product, true)" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 py-1 px-3 rounded-r cursor-pointer">+</button>
                                    </div>
                                </td>
                                <td class="p-2">${{ product.quantity * product.price }}
                                    COP
                                </td>
                                <td>
                                    <button @click="deleteItem(product)" class="bg-red-500 hover:bg-opacity-90 text-white font-bold p-2 rounded focus:outline-none focus:shadow-outline">
                                        <trash-icon class=" h-5 w-5" aria-hidden="true" />
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="grid grid-cols-8">
                                <td class="col-span-7"></td>
                                <td v-if="products != 0">Total a pagar:
                                                        ${{ totalPrice }} COP</td>
                                <td class="col-span-6 py-5">
                                    <div >
                                        <button class="bg-zinc-800 hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            <a href="http://dreams.test/products">
                                                Regresar a la tienda
                                            </a>
                                        </button>
                                    </div>
                                </td>
                                <td v-if="products != 0" class="col-span-2 py-5">
                                    <div>
                                        <button class="bg-zinc-800 hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            <a href="{{ config('webcheckout.url') }}">
                                                Continuar con el pago
                                            </a>
                                        </button>
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
