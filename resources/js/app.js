require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';
import CButton from './components/CButton';
import Dropdown from './components/Dropdown';
import UsersTable from './components/UsersTable';
import ProductsTable from './components/ProductsTable';
import { RewindIcon } from '@heroicons/vue/solid';

createApp({
    components: {
        'app': App,
        'c-button': CButton,
        'dropdown': Dropdown,
        'users-table': UsersTable,
        'products-table': ProductsTable,
        'rewind-icon': RewindIcon(),
    },
}).mount('#app');
