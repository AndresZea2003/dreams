<template>
    <div class="grid grid-cols-3 gap-10">
        <div>
            <a :href="tienda">
                <div :class="`flex ${textColor1} justify-center`">
                    Tienda
                    <shopping-bag-icon class="mx-2 h-7 w-7" />
                </div>
            </a>
        </div>
        <!--            <a :href="historial">-->
        <!--                <div :class="`flex ${textColor3} justify-center`">-->
        <!--                    Historial-->
        <!--                    <shopping-bag-icon class="mx-5 h-7 w-7" />-->
        <!--                </div>-->
        <!--            </a>-->
        <div>
            <a :href="cart">
                <div :class="`flex ${textColor4} justify-center hover:cursor-pointer hover:text-green-300`">
                    <span class="flex">
                        Carrito
                        <shopping-cart-icon class="mx-2 h-7 w-7" />
                        <span class="font-bold">({{ totalQuantity }})</span>
                    </span>
                </div>
            </a>
        </div>
        <div>
            <a :href="historial">
                <div :class="`flex ${textColor2} justify-center hover:cursor-pointer hover:text-green-300`">
                    Compras
                    <ClockIcon class="mx-2 h-7 w-7" />
                </div>
            </a>
        </div>
    </div>
</template>
<script setup>
import { ShoppingCartIcon, StarIcon, ShoppingBagIcon, ClockIcon } from '@heroicons/vue/outline';
import { ref } from 'vue';
import { getCartProducts } from '../use';

const props = defineProps({
    user_id: { type: Number, required: true },
});

const products = ref(getCartProducts(props.user_id));
const totalQuantity = ref(0);

totalQuantity.value = products.value.reduce((prev, current) => prev + current.quantity, 0);

const current = window.location.href;
const cart = 'http://dreams.test/shop';
const tienda = 'http://dreams.test/products';
const historial = 'http://dreams.test/payments';
const fav = '';

const textColor1 = current === tienda ? 'text-green-300' : 'text-white';
const textColor2 = current === historial ? 'text-green-300' : 'text-white';
// const textColor3 = current === historial ? 'text-green-300' : 'text-white';
const textColor4 = current === cart ? 'text-green-300' : 'text-white';
</script>
