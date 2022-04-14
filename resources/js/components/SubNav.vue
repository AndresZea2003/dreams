<template>
<div class="bg-gray-900">
    <div class="grid grid-cols-12 px-5 py-2 container mx-auto flex">
        <a :href="tienda" class="col-span-4">
            <div :class="`flex col-span-4 ${textColor1} justify-center`">
                Tienda
                <shopping-bag-icon class="h-7 w-7 mx-5"/>
            </div>
        </a>
        <div :class="`flex col-span-4 ${textColor2} justify-center`">
            Favoritos
            <star-icon class="h-7 w-7 mx-5"/>
        </div>
        <a :href="cart" class="col-span-4">
            <div :class="`flex ${textColor3} justify-center hover:text-green-300 hover:cursor-pointer`">
                    Carrito {{ totalQuantity }}
                <shopping-cart-icon class="h-7 w-7 mx-5"/>
            </div>
        </a>
    </div>
</div>
</template>
<script setup>
import { ShoppingCartIcon, StarIcon, ShoppingBagIcon } from '@heroicons/vue/outline';
import { ref } from "vue";
import {getCartProducts} from "../use";

const products = ref(getCartProducts())
const totalQuantity = ref(0)

totalQuantity.value = products.value.reduce((prev, current) => prev + current.quantity, 0);

const current = window.location.href
const cart = "http://dreams.test/shop"
const tienda = "http://dreams.test/products"
const fav = ""

const textColor1 = (current === tienda) ? 'text-green-300' : 'text-white'
const textColor2 = (current === fav) ? 'text-green-300' : 'text-white'
const textColor3 = (current === cart) ? 'text-green-300' : 'text-white'

</script>
