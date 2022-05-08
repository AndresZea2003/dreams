<script setup>
import { ref } from 'vue';
import { EyeIcon } from '@heroicons/vue/solid';
import { ClockIcon, CurrencyDollarIcon } from '@heroicons/vue/outline'

const props = defineProps({
    payments: { type: Object, required: true },
    count: { type: Number, required:true },
    name: { type: String , required:true }
});

const payments = ref(props.payments.data);
const cont = ref(props.count);
const name = ref(props.name);

</script>
<template>
    <div class="mt-5 flex justify-center">
        <div class="grid grid-cols-2">
            <div>
                <div class="flex flex-col items-center mt-10">
                    <CurrencyDollarIcon class="text-yellow-500 h-20 w-20" aria-hidden="true" />
                    <div class="flex flex-col items-center my-2">
                        <span class="font-alatsi text-3xl">Pagos totales</span>
                    </div>
                    <p class="text-xl">Actualmente se han realizado <span class="font-bold">{{ count }}</span> procesos de pago</p>

                </div>
            </div>
            <div class="mr-20 mt-10">

                <table class="overflow-hidden rounded-lg border border-gray-600 shadow">
                    <thead class="bg-neutral-800 text-white">
                        <tr>
                            <th
                                scope="col"
                                class="py-3 pl-6 text-left text-sm font-bold uppercase tracking-wider"
                            >
                                Id
                            </th>
                            <th
                                scope="col"
                                class="py-3 pl-6 text-left text-sm font-bold uppercase tracking-wider"
                            >
                                User
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider"
                            >
                                Reference
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider"
                            >
                                Description
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-center font-bold uppercase tracking-wider"
                            >
                                Request id
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider"
                            >
                                Status
                            </th>
                            <th scope="col" class="relative px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-400">
                        <tr v-for="payment in payments" :key="payment.id">
                            <td class="py-3 pl-6 text-left text-xs font-medium uppercase tracking-wider">
                                {{ payment.id }}
                            </td>
                            <td class="py-3 pl-6 text-center text-xs font-medium uppercase tracking-wider">
                                {{ payment.user_id }}
                            </td>
                            <td class="py-3 pl-6 text-left text-xs font-medium uppercase tracking-wider">
                                {{ payment.reference }}
                            </td>
                            <td class="py-3 pl-6 text-left text-xs font-medium uppercase tracking-wider">
                                {{ payment.description }}
                            </td>
                            <td class="py-3 pl-6 text-center text-xs font-medium uppercase tracking-wider">
                                {{ payment.request_id }}
                            </td>
                            <td v-if="payment.status === 'APPROVED'" class="py-3 pl-6 text-left text-green-300 font-medium uppercase tracking-wider">
                                {{ payment.status }}
                            </td>
                            <td v-if="payment.status === 'PENDING'" class="py-3 pl-6 text-left text-yellow-200 font-medium uppercase tracking-wider">
                                {{ payment.status }}
                            </td>
                            <td v-if="payment.status === 'REJECTED'" class="py-3 pl-6 text-left text-red-700 font-medium uppercase tracking-wider">
                                {{ payment.status }}
                            </td>
                            <td class="relative px-3 py-3">
                                <a :href="`http://dreams.test/payments/${payment.id}`">
                                    <button
                                        type="submit"
                                        class="inline-flex items-center rounded-md border border-transparent bg-zinc-800 py-2 pl-4 text-base font-medium text-white shadow-sm hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                    >
                                        <EyeIcon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />
                                    </button>
                                </a>
                            </td>
                            <!--                        <td class="px-6 py-3 text-left text-xs font-medium text-white">-->
                            <!--                            <div class="flex items-center">-->
                            <!--                                <img-->
                            <!--                                    class="h-10 w-10 rounded-full"-->
                            <!--                                    :src="`https://ui-avatars.com/api/?name=${user.name}&background=eed09d&color=000&size=50&bold=true`"-->
                            <!--                                    alt="Avatar"-->
                            <!--                                />-->
                            <!--                                <div class="ml-4">-->
                            <!--                                    <div class="text-sm font-bold uppercase text-gray-200">-->
                            <!--                                        {{ user.name }}-->
                            <!--                                    </div>-->
                            <!--                                    <div class="text-sm text-white">-->
                            <!--                                        {{ user.email }}-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </td>-->
                            <!--                        <td class="px-6 py-3 text-left text-xs font-medium tracking-wider text-white">-->
                            <!--                            <form :action="routes['user-status.toggle'].uri.replace('{user}', user.id)" method="POST">-->
                            <!--                                <CsrfToken />-->
                            <!--                                <input type="hidden" name="_method" value="PATCH" />-->
                            <!--                                <button-->
                            <!--                                    v-if="current !== user.id"-->
                            <!--                                    type="submit"-->
                            <!--                                    :class="[-->
                            <!--                                        'flex items-center gap-2 rounded px-4 py-1 text-sm font-medium text-white',-->
                            <!--                                        user.disabledAt-->
                            <!--                                            ? 'bg-red-500 hover:bg-red-600'-->
                            <!--                                            : 'bg-green-500 hover:bg-green-600',-->
                            <!--                                    ]"-->
                            <!--                                >-->
                            <!--                                    {{ user.disabledAt ? 'Disabled' : 'Enabled' }}-->
                            <!--                                </button>-->
                            <!--                            </form>-->
                            <!--                        </td>-->
                            <!--                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-white">-->
                            <!--                            {{ user.role }}-->
                            <!--                        </td>-->
                            <!--                        <td class="relative px-6 py-3">-->
                            <!--                            <form :action="routes['users.destroy'].uri.replace('{user}', user.id)" method="POST">-->
                            <!--                                <CsrfToken />-->
                            <!--                                <input type="hidden" name="_method" value="DELETE" />-->
                            <!--                                <button-->
                            <!--                                    type="submit"-->
                            <!--                                    v-if="current !== user.id"-->
                            <!--                                    @click="toggleStatus(user)"-->
                            <!--                                    class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"-->
                            <!--                                >-->
                            <!--                                    <TrashIcon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />-->
                            <!--                                    Delete-->
                            <!--                                </button>-->
                            <!--                            </form>-->
                            <!--                        </td>-->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
