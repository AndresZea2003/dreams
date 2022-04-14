<template>
    <button @click="actions.addToCart(product)"
        class="focus:shadow-outline mx-5 rounded bg-zinc-800 py-2 px-4 text-2xl font-bold text-white hover:bg-opacity-90 focus:outline-none">
            <ShoppingCartIcon class="h-7 w-7 text-red-500" aria-hidden="true" />
    </button>
</template>

<script>
import { ShoppingCartIcon } from '@heroicons/vue/outline';
import { actions } from '../../use';

export default {
    name: 'AddButton',
    components: { ShoppingCartIcon },
    props: { product: { type: Object } },
    setup() {
        return { actions }
    }
};
</script>
