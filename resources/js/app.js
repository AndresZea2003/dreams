require('./bootstrap');

import {createApp} from 'vue';
import CButton from './components/CButton';

createApp({
    components:{
    'c-button': CButton,
    }
}).mount('#app');
