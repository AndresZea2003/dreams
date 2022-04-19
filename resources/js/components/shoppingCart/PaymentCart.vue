<script setup>

import {ref} from "vue";
import CsrfToken from "../helpers/CsrfToken";

const props = defineProps({
    payment: {type:Object , required:true}
})

const payment = ref(JSON.parse(props.payment))

console.log(payment.value)

</script>

<template>
<span class="text-3xl">Informacion sobre el pago</span>

    <div class="bg-gray-300 p-10 rounded-md shadow-md">
        <div class="bg-gray-400">
            <div class="p-10 font-bold">
                <p class="text-3xl font-alatsi">Payment ID {{ payment.id }}</p><br>

                <table>
                    <thead>
                        <tr>
                            <th class="px-5">Reference</th>
                            <th class="px-5">Description</th>
                            <th class="px-5">Amount</th>
                            <th class="px-5"> Status</th>
                            <th class="px-5">Request_id</th>
                            <th class="px-5">Invoice_id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="px-5 font-normal">{{ payment.reference }}</td>
                            <td class="px-5 font-normal">{{ payment.description }}</td>
                            <td class="px-5 font-normal">${{ payment.amount }} COP</td>
                            <td class="px-5 font-normal">{{ payment.status }}</td>
                            <td class="px-5 font-normal">{{ payment.request_id }}</td>
                            <td class="px-5 font-normal">{{ payment.invoice_id }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>


        <div class="mt-5">
            <form :action="`http://dreams.test/payments/${payment.id}/try-payment`" method="post">
                <csrf-token></csrf-token>
<!--                <input type="text" :value="reference" name="reference" hidden>-->
<!--                <input type="text" :value="description" name="description" hidden>-->
<!--                <input type="number" :value="id" name="invoice_id" hidden>-->
<!--                <input type="number" :value="total" name="amount" hidden>-->
                <div class="flex justify-between">

                    <button class="focus:shadow-outline rounded bg-zinc-800 mr-20 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none">
                        <a href="http://dreams.test/payments">
                            Regresar
                        </a>
                    </button>
                    <button v-if="payment.status==='PENDING'" type="submit" class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none">
                        Reintentar el pago
                    </button>
                </div>
            </form>

            <form :action="`http://dreams.test/payments/${payment.id}`" method="POST">
                        <csrf-token></csrf-token>
                        <input type="hidden" name="_method" value="PATCH" />
                        <button type="submit" class="focus:shadow-outline rounded bg-zinc-800 py-2 px-4 font-bold text-white hover:bg-opacity-90 focus:outline-none">
                                Refresh
                        </button>
                    </form>

            </div>
    </div>
</template>
