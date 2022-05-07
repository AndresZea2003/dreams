<script setup="props">
import { watch, ref } from 'vue';
import { getCartProducts } from '../../use';
import { findIndex } from 'lodash';
import { TrashIcon } from '@heroicons/vue/outline';
import CsrfToken from '../helpers/CsrfToken';

const props = defineProps({
    user_id: { type: String, required: true },
});

const products = ref(getCartProducts(props.user_id));

const totalQuantity = ref(0);
const totalPrice = ref(0);

const deleteKey = (key) => {
    localStorage.removeItem(key);
    location.replace('http://dreams.test/shop');
};

const change = (product, isAdd, user_id) => {
    if (isAdd) product.quantity++;
    else product.quantity--;
    if (!product.quantity) {
        const id = findIndex(products.value, ['id', product.id]);
        products.value.splice(id, 1);
    }
    localStorage.setItem(`products${user_id}`, JSON.stringify(products.value));
};

const deleteItem = (product, user_id) => {
    const id = findIndex(products.value, ['id', product.id]);
    products.value.splice(id, 1);
    localStorage.setItem(`products${user_id}`, JSON.stringify(products.value));
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
            <div class="mx-60 gap-1 rounded-md bg-neutral-800 p-10 text-white drop-shadow-lg">
                <div class="font-alatsi pb-5 flex justify-between border-b-2 border-black px-5 text-2xl">
                    <p>Carrito ( {{ totalQuantity }} products )</p>
                    <button
                        v-if="products != 0"
                        @click="deleteKey(`products${user_id}`)"
                        class="focus:shadow-outline rounded bg-gray-600 py-2 px-4 text-sm text-white hover:bg-opacity-90 focus:outline-none"
                    >
                        Eliminar productos del carrito
                    </button>
                </div>

                <div class="pt-5">
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
                                            @click="change(product, false, user_id)"
                                            class="cursor-pointer rounded-l bg-gray-300 py-1 px-3 text-gray-600 hover:bg-gray-400 hover:text-gray-700"
                                        >
                                            -
                                        </button>
                                        <span
                                            class="text-md md:text-basecursor-default flex items-center bg-gray-300 py-1 px-3 text-center font-semibold text-gray-700 outline-none hover:text-black focus:text-black"
                                            >{{ product.quantity }}</span
                                        >
                                        <button
                                            @click="change(product, true, user_id)"
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
                                        @click="deleteItem(product, user_id)"
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
                                            class="focus:shadow-outline rounded bg-gray-600 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none"
                                        >
                                            <a href="http://dreams.test/products">
                                                Regresar a la tienda
                                            </a>
                                        </button>
                                    </div>
                                </td>
                                <td v-if="products != 0" class="col-span-2 py-5">
                                    <div>
                                        <form action="invoices" method="POST" class="text-black">
                                            <csrf-token></csrf-token>
                                            <!--                                            <input type="number" name="user_id" :value="user_id" hidden >-->
                                            <input
                                                type="number"
                                                name="quantity_products"
                                                :value="totalQuantity"
                                                hidden
                                            />
                                            <input type="number" name="total" :value="totalPrice" hidden />

                                            <button
                                                type="submit"
                                                class="focus:shadow-outline rounded bg-gray-600 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none"
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
