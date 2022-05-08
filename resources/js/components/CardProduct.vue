<template>
    <!--    <div-->
    <!--        v-for="product in products"-->
    <!--        :key="product.id"-->
    <!--        class="min-h-[10rem] w-72 cursor-pointer overflow-hidden rounded-md shadow-lg hover:shadow-white"-->
    <!--    >-->
    <!--        <div class="bg-white px-4 py-6">-->

    <!--            &lt;!&ndash;            <img&ndash;&gt;-->
    <!--            &lt;!&ndash;                src="https://ebani.com.co/wp-content/uploads/2021/08/Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit-1-Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit.jpg"&ndash;&gt;-->
    <!--            &lt;!&ndash;                alt=""&ndash;&gt;-->
    <!--            &lt;!&ndash;            />&ndash;&gt;-->
    <!--            &lt;!&ndash;            <img :src="{{ product.photo }}" alt="">&ndash;&gt;-->
    <!--            <div class="h-60 w-full bg-gray-200 flex justify-center items-center rounded-md">-->
    <!--                <img class="" :src="`http://dreams.test/${product.photo}`" alt="">-->
    <!--            </div>-->
    <!--        </div>-->


    <!--        <div class="bg-white py-4 px-4">-->
    <!--            <div class="grid grid-cols-3 gap-5">-->
    <!--                <p class="rounded-full bg-yellow-200 text-center">New</p>-->
    <!--                <p class="rounded-full bg-green-300 text-center">ID {{ product.id }}</p>-->
    <!--            </div>-->
    <!--            <h3 class="text-center text-2xl font-semibold text-black">{{ product.name }}</h3>-->
    <!--            <p class="text-center text-2xl font-semibold text-red-500">${{ product.price }}</p>-->
    <!--            <p class="rounded-full bg-red-300 text-center">{{ product.available }} Disponibles</p>-->
    <!--            &lt;!&ndash;                   <p class="mt-4 text-lg font-thin">Description: {{ $product['description'] }}</p>&ndash;&gt;-->
    <!--            &lt;!&ndash;                  <p class="mt-4 text-lg font-thin">Quantity: {{ $product['quantity'] }}</p>&ndash;&gt;-->
    <!--            <div class="mt-2 flex justify-between">-->
    <!--                <button-->
    <!--                    class="focus:shadow-outline mx-5 rounded bg-zinc-800 py-2 px-4 text-2xl font-bold text-white hover:bg-opacity-90 focus:outline-none"-->
    <!--                >-->
    <!--                    <a :href="`products/${product.id}`"> ver </a>-->
    <!--                </button>-->
    <!--                &lt;!&ndash;                <AddButton :product="product" :user-id="userId"></AddButton>&ndash;&gt;-->
    <!--                <button-->
    <!--                    @click="actions.addToCart(product, user_id)"-->
    <!--                    class="focus:shadow-outline mx-5 rounded bg-zinc-800 py-2 px-4 text-2xl font-bold text-white hover:bg-opacity-90 focus:outline-none"-->
    <!--                >-->
    <!--                    <ShoppingCartIcon class="h-7 w-7 text-red-500" aria-hidden="true"/>-->
    <!--                </button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <div
        v-for="product in products"
        :key="product.id"
    >

        <div class="card flex flex-col justify-center">
            <a :href="`http://dreams.test/products/${product.id}`">
                <div class="image"><img
                    :src="`http://dreams.test/${product.photo}`"
                    alt="">
                </div>
            </a>
            <span class="font-alatsi">{{ product.name }}</span>
            <span class="price font-alatsi text-green-600 pb-1">${{ product.price }} COP</span>
            <div class="grid grid-cols-2">
                <a :href="`http://dreams.test/products/${product.id}`">
                    <button
                        class="focus:shadow-outline mx-5 rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none"
                    >
                        <span>Ver</span>
                    </button>
                </a>
                <button
                    @click="actions.addToCart(product, user_id)"
                    class="focus:shadow-outline mx-5 rounded bg-zinc-800 py-2 px-4 text-2xl font-bold text-white hover:bg-opacity-90 focus:outline-none"
                >
                    <ShoppingCartIcon class="h-5 w-5 text-red-500" aria-hidden="true"/>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import CsrfToken from './helpers/CsrfToken';
import AddButton from './shoppingCart/AddButton';
import {TrashIcon, ShoppingCartIcon, EyeIcon} from '@heroicons/vue/outline';
import {actions} from '../use';

export default {
    name: 'CardProduct',
    components: {TrashIcon, CsrfToken, ShoppingCartIcon, EyeIcon, AddButton},
    props: {
        products: {type: Array, required: true},
        user_id: {type: Number, required: true},
    },
    setup() {
        return {actions};
    },
};
</script>
