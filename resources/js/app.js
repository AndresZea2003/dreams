require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';
import CButton from './components/CButton';
import Dropdown from './components/Dropdown';

createApp({
    components: {
        'app': App,
        'c-button': CButton,
        'dropdown': Dropdown,
    },
}).mount('#app');
