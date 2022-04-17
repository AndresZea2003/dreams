<template>
    <div
        v-for="product in products"
        :key="product.id"
        class="min-h-[10rem] w-72 cursor-pointer overflow-hidden rounded-md shadow-lg hover:shadow-white"
    >
        <div>
            <img
                src="https://ebani.com.co/wp-content/uploads/2021/08/Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit-1-Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit.jpg"
                alt=""
            />
        </div>

        <div class="bg-white py-4 px-4">
            <div class="grid grid-cols-3 gap-5">
                <p class="rounded-full bg-yellow-200 text-center">New</p>
                <p class="rounded-full bg-green-300 text-center">ID {{ product.id }}</p>
            </div>
            <h3 class="text-center text-2xl font-semibold text-black">{{ product.name }}</h3>
            <p class="text-center text-2xl font-semibold text-red-500">${{ product.price }}</p>
            <p class="rounded-full bg-red-300 text-center">{{ product.available }} Disponibles</p>
            <!--                   <p class="mt-4 text-lg font-thin">Description: {{ $product['description'] }}</p>-->
            <!--                  <p class="mt-4 text-lg font-thin">Quantity: {{ $product['quantity'] }}</p>-->
            <div class="mt-2 flex justify-between">
                <button
                    class="focus:shadow-outline mx-5 rounded bg-zinc-800 py-2 px-4 text-2xl font-bold text-white hover:bg-opacity-90 focus:outline-none"
                >
                    <a :href="`products/${product.id}`"> ver </a>
                </button>
<!--                <AddButton :product="product" :user-id="userId"></AddButton>-->
                <button
                    @click="actions.addToCart(product,user_id)"
                    class="focus:shadow-outline mx-5 rounded bg-zinc-800 py-2 px-4 text-2xl font-bold text-white hover:bg-opacity-90 focus:outline-none"
                        >
                    <ShoppingCartIcon class="h-7 w-7 text-red-500" aria-hidden="true" />
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import CsrfToken from './helpers/CsrfToken';
import AddButton from './shoppingCart/AddButton';
import { TrashIcon, ShoppingCartIcon } from '@heroicons/vue/outline';
import { actions } from "../use";

export default {
    name: 'CardProduct',
    components: { TrashIcon, CsrfToken, ShoppingCartIcon, AddButton },
    props: {
        products: { type: Array, required: true },
        links: { type: Array, required: true },
        user_id: {type: Number, required:true },

    },
    setup()
    {
         return {actions}
    }
};
</script>
