<template>
    <div class="mt-5 flex justify-center">
        <div>
            <table class="overflow-hidden rounded-lg border border-gray-600 shadow">
                <thead class="bg-zinc-800">
                    <tr>
                        <th
                            scope="col"
                            class="py-3 pl-6 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Id
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Name
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Status
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-white"
                        >
                            Role
                        </th>
                        <th scope="col" class="relative px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-zinc-700">
                    <tr v-for="user in users" :key="user.id">
                        <td class="py-3 pl-6 text-left text-xs font-medium uppercase tracking-wider text-gray-300">
                            {{ user.id }}
                        </td>
                        <td class="px-6 py-3 text-left text-xs font-medium text-white">
                            <div class="flex items-center">
                                <img
                                    class="h-10 w-10 rounded-full"
                                    :src="`https://ui-avatars.com/api/?name=${user.name}&background=eed09d&color=000&size=50&bold=true`"
                                    alt="Avatar"
                                />
                                <div class="ml-4">
                                    <div class="text-sm font-bold uppercase text-gray-200">
                                        {{ user.name }}
                                    </div>
                                    <div class="text-sm text-white">
                                        {{ user.email }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-3 text-left text-xs font-medium tracking-wider text-white">
                            <form :action="routes['user-status.toggle'].uri.replace('{user}', user.id)" method="POST">
                                <CsrfToken />
                                <input type="hidden" name="_method" value="PATCH" />
                                <button
                                    v-if="current !== user.id"
                                    type="submit"
                                    :class="[
                                        'flex items-center gap-2 rounded px-4 py-1 text-sm font-medium text-white',
                                        user.disabledAt
                                            ? 'bg-red-500 hover:bg-red-600'
                                            : 'bg-green-500 hover:bg-green-600',
                                    ]"
                                >
                                    {{ user.disabledAt ? 'Disabled' : 'Enabled' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-white">
                            {{ user.role }}
                        </td>
                        <td class="relative px-6 py-3">
                            <form :action="routes['users.destroy'].uri.replace('{user}', user.id)" method="POST">
                                <CsrfToken />
                                <input type="hidden" name="_method" value="DELETE" />
                                <button
                                    type="submit"
                                    v-if="current !== user.id"
                                    @click="toggleStatus(user)"
                                    class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                >
                                    <TrashIcon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import CsrfToken from './helpers/CsrfToken';
import { routes } from '../use';

import { TrashIcon } from '@heroicons/vue/outline';
export default {
    name: 'UsersTable',
    components: { TrashIcon, CsrfToken },
    props: {
        users: { type: Array, required: true },
        current: { type: Number, required: true },
        pagination: { type: Array, required: true },
    },
    setup(props) {
        const toggleStatus = (user) => {
            console.log(user);
            axios.post(routes.value['user-status.toggle'].uri.replace('{user}', user.id));
        };
        return { toggleStatus, routes };
    },
};
</script>
