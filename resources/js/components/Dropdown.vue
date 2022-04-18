<template>
    <div class="z-10">
        <Menu as="div" class="relative z-10 inline-block text-left">
            <div>
                <MenuButton>
                    <button>
                        <img
                            class="h-15 w-15 rounded-full hover:opacity-80"
                            :src="`https://ui-avatars.com/api/?name=${name}&background=d1d5db&color=000&size=50&bold=true`"
                            alt="Avatar"
                        />
                    </button>
                </MenuButton>
            </div>
            <transition
                enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0"
                enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in"
                leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0"
            >
                <MenuItems
                    class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                >
                    <div class="px-1 py-1">
                        <MenuItem v-slot="{ active }">
                            <a
                                :href="profileRoute"
                                :class="[
                                    active ? 'bg-zinc-800 text-white' : 'text-gray-900',
                                    'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                ]"
                            >
                                <UserCircleIcon :active="active" class="mr-2 h-5 w-5" aria-hidden="true" />
                                Profile
                            </a>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <a
                                :href="productsRoute"
                                :class="[
                                    active ? 'bg-zinc-800 text-white' : 'text-gray-900',
                                    'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                ]"
                            >
                                <ArchiveIcon :active="active" class="mr-2 h-5 w-5" aria-hidden="true" />
                                Products
                            </a>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <a
                                :href="paymentsRoute"
                                :class="[
                                    active ? 'bg-zinc-800 text-white' : 'text-gray-900',
                                    'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                ]"
                            >
                                <BookOpenIcon :active="active" class="mr-2 h-5 w-5" aria-hidden="true" />
                                Payments
                            </a>
                        </MenuItem>
                        <MenuItem v-if="panelRoute" v-slot="{ active }">
                            <a
                                :href="panelRoute"
                                :class="[
                                    active ? 'bg-zinc-800 text-white' : 'text-gray-900',
                                    'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                ]"
                            >
                                <PresentationChartBarIcon :active="active" class="mr-2 h-5 w-5" aria-hidden="true" />
                                Panel
                            </a>
                        </MenuItem>
                    </div>
                    <div class="px-1 py-1">
                        <MenuItem v-slot="{ active }">
                            <button
                                type="submit"
                                form="logout"
                                :class="[
                                    active ? 'bg-red-400 text-white' : 'text-gray-900',
                                    'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                ]"
                            >
                                <LogoutIcon :active="active" class="mr-2 h-5 w-5" aria-hidden="true" />
                                Logout
                            </button>
                        </MenuItem>
                    </div>
                </MenuItems>
            </transition>
        </Menu>
    </div>
    <form id="logout" class="hidden" :action="routes.logout.uri" method="POST"><CsrfToken /></form>
</template>

<script>
import CsrfToken from './helpers/CsrfToken';
import { routes } from '../use';
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue';
import {
    ChevronDownIcon,
    LogoutIcon,
    UserCircleIcon,
    PresentationChartBarIcon,
    UserIcon,
    ArchiveIcon,
    BookOpenIcon
} from '@heroicons/vue/solid';

export default {
    props: {
        name: { type: String, required: true },
        profileRoute: { type: String, required: true },
        productsRoute: { type: String, required: true },
        panelRoute: { type: String, required: true },
        paymentsRoute: { type: String, required:true},
    },
    components: {
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
        ChevronDownIcon,
        LogoutIcon,
        UserCircleIcon,
        PresentationChartBarIcon,
        UserIcon,
        ArchiveIcon,
        BookOpenIcon,
        CsrfToken,
    },
    setup() {
        return { routes };
    },
};
</script>
