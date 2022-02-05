require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';
import CButton from './components/CButton';
import Dropdown from './components/Dropdown';
import UsersTable from './components/UsersTable';

createApp({
    components: {
        'app': App,
        'c-button': CButton,
        'dropdown': Dropdown,
        'users-table': UsersTable,
    },
}).mount('#app');
