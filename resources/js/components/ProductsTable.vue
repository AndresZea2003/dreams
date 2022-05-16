<template>
    <div class="mt-5 flex justify-center">
        <div>
            <button
                class="mb-3 inline-flex items-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
            >
                <PlusIcon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />
                <a href="products/create"> Add a new product </a>
            </button>

            <table v-if="products" class="overflow-hidden rounded-lg border border-gray-600 shadow">
                <thead class="bg-zinc-800">
                    <tr>
                        <th
                            scope="col"
                            class="py-3 pl-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Id
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Name
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Description
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Price
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Quantity
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Status
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Show
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Edit
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Delete
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-zinc-700">
                    <tr v-for="product in products" :key="product.id">
                        <td class="py-3 pl-3 text-left text-xs font-medium uppercase tracking-wider text-gray-300">
                            {{ product.id }}
                        </td>
                        <td class="text-sm font-bold uppercase text-gray-200">
                            {{ product.name }}
                        </td>
                        <td class="px-3 py-3 text-left text-xs font-medium tracking-wider text-white">
                            {{ product.description }}
                        </td>
                        <td class="px-3 py-3 text-center text-xs font-medium uppercase tracking-wider text-white">
                            ${{ product.price }} COP
                        </td>
                        <td class="relative px-3 py-3 text-center font-bold text-white">
                            {{ product.quantity }}
                        </td>
                        <td class="relative px-3 py-3">
                            <form :action="'http://dreams.test/admin/products/' + product.id + '/toggle'" method="POST">
                                <CsrfToken />
                                <input type="hidden" name="_method" value="PATCH" />
                                <button
                                    type="submit"
                                    :class="[
                                        'flex items-center gap-2 rounded px-4 py-1 text-sm font-medium text-white',
                                        product.disabled_at
                                            ? 'bg-red-500 hover:bg-red-600'
                                            : 'bg-green-500 hover:bg-green-600',
                                    ]"
                                >
                                    {{ product.disabled_at ? 'Disabled' : 'Enabled' }}
                                </button>
                            </form>
                        </td>
                        <td class="relative px-3 py-3">
                            <a :href="`http://dreams.test/admin/products/${product.id}`">
                                <button
                                    type="submit"
                                    class="inline-flex items-center rounded-md border border-transparent bg-sky-600 py-2 pl-4 text-base font-medium text-white shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                >
                                    <EyeIcon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />
                                </button>
                            </a>
                        </td>
                        <td class="relative px-3 py-3">
                            <a :href="`http://dreams.test/admin/products/${product.id}/edit`">
                                <button
                                    type="submit"
                                    class="inline-flex items-center rounded-md border border-transparent bg-yellow-600 py-2 pl-4 text-base font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                >
                                    <PencilIcon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />
                                </button>
                            </a>
                        </td>
                        <td class="relative px-3 py-3">
                            <button
                                @click="destroy(product.id)"
                                type="submit"
                                class="inline-flex items-center rounded-md border border-transparent bg-red-600 py-2 pl-4 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            >
                                <TrashIcon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-center">
                <div
                    @click="goTo(link.url)"
                    class="cursor-pointer rounded border border-gray-600 bg-zinc-800 p-4 text-white hover:bg-black"
                    v-for="link in links"
                    :key="link.label"
                >
                    {{ link.label }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CsrfToken from './helpers/CsrfToken';
import { routes } from '../use';
import axios from 'axios';
import { ref } from 'vue';

import { TrashIcon } from '@heroicons/vue/outline';
import { PencilIcon, PlusIcon, EyeIcon } from '@heroicons/vue/solid';

export default {
    components: { TrashIcon, CsrfToken, PencilIcon, PlusIcon, EyeIcon },
    name: 'ProductsTable',
    setup() {
        const products = ref();
        const links = ref();
        const getProducts = () => {
            axios.get('http://dreams.test/api/products').then((response) => {
                products.value = response.data.data;
                links.value = response.data.links;
            });
        };
        getProducts();
        const goTo = (url) => {
            if (!url) return;
            axios.get(url).then((response) => {
                products.value = response.data.data;
                links.value = response.data.links;
            });
        };
        const destroy = (id) => {
            axios.delete('http://dreams.test/api/products/' + id).then(() => {
                getProducts();
            });
        };
        const toggle = (id) => {
            axios.patch('http://dreams.test/admin/products/' + id + '/toggle').then(() => {
                getProducts();
            });
        };
        return { products, links, destroy, goTo, toggle, routes };
    },
};
</script>
