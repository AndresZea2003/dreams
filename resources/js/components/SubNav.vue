<template>
    <div class="bg-gray-900">
        <div class="container mx-auto flex grid grid-cols-12 px-5 py-2">
            <a :href="tienda" class="col-span-4">
                <div :class="`col-span-4 flex ${textColor1} justify-center`">
                    Tienda
                    <shopping-bag-icon class="mx-5 h-7 w-7" />
                </div>
            </a>
            <div :class="`col-span-4 flex ${textColor2} justify-center`">
                Favoritos
                <star-icon class="mx-5 h-7 w-7" />
            </div>
            <a :href="cart" class="col-span-4">
                <div :class="`flex ${textColor3} justify-center hover:cursor-pointer hover:text-green-300`">
                    Carrito {{ totalQuantity }}
                    <shopping-cart-icon class="mx-5 h-7 w-7" />
                </div>
            </a>
        </div>
    </div>
</template>
<script setup>
import { ShoppingCartIcon, StarIcon, ShoppingBagIcon } from '@heroicons/vue/outline';
import { ref } from 'vue';
import { getCartProducts } from '../use';

const props = defineProps({
    user_id: {type:Number, required:true}
})

const products = ref(getCartProducts(props.user_id));
const totalQuantity = ref(0);

totalQuantity.value = products.value.reduce((prev, current) => prev + current.quantity, 0);

const current = window.location.href;
const cart = 'http://dreams.test/shop';
const tienda = 'http://dreams.test/products';
const fav = '';

const textColor1 = current === tienda ? 'text-green-300' : 'text-white';
const textColor2 = current === fav ? 'text-green-300' : 'text-white';
const textColor3 = current === cart ? 'text-green-300' : 'text-white';
</script>
