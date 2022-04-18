<script setup>
import {ref} from 'vue';
import CsrfToken from '../helpers/CsrfToken';
import { getCartProducts } from '../../use';

const props = defineProps({
    invoice: {type:String, required:true},
    user_id: {type:String, required:true}
})

const invoce = ref(JSON.parse(props.invoice))
const id = invoce.value.id
const reference = invoce.value.reference
const quantity_products = invoce.value.quantity_products
const status = invoce.value.status
const total = invoce.value.total
const description = `INVOICE #${id}, purchase of ${quantity_products} products`

const Items = ref(getCartProducts(props.user_id))

</script>

<template>
<!--<span class="text-3xl">{{ status }} PAYMENT</span>-->

    <div class="bg-gray-300 p-10 rounded-md shadow-md grid grid-cols-2 gap-5">

        <div class="bg-gray-400">
            <div class="p-10 font-bold text-center">
                <p class="text-3xl">Invoice</p>
    <!--            <p>{{ $invoice }}</p>-->
                <p>Invoice id: {{ id }}</p>
                <p>reference: #{{ reference }}</p>
    <!--            <p>quantity_proudcts: {{ quantity_products }}</p>-->
                <p>status: {{ status }}</p>
                <p>Total: ${{ total }} COP</p><br>
                <p class="bg-gray-200">{{ description }}</p>
            </div>

        </div>


        <div class="bg-gray-400">
            <div>
                Aqui items
            </div>
        </div>


        <div class="col-span-2">
            <form action="http://dreams.test/payments" method="post">
                <csrf-token></csrf-token>
                <input type="text" :value="reference" name="reference" hidden>
                <input type="text" :value="description" name="description" hidden>
                <input type="number" :value="id" name="invoice_id" hidden>
                <input type="number" :value="total" name="amount" hidden>
                <div class="flex justify-between">

                    <button class="focus:shadow-outline rounded bg-zinc-800 mr-20 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none">
                        <a href="http://dreams.test/shop">
                            Regresar
                        </a>
                    </button>
                    <button type="submit" class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none">
                        Paga con PlaceToPay
                    </button>
                </div>
            </form>

            </div>
    </div>
</template>
