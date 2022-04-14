require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';
import CButton from './components/CButton';
import Dropdown from './components/Dropdown';
import UsersTable from './components/UsersTable';
import ProductsTable from './components/ProductsTable';
import CardProduct from './components/CardProduct';
import { RewindIcon } from '@heroicons/vue/solid';
import { ShoppingCartIcon, StarIcon, ShoppingBagIcon } from '@heroicons/vue/outline';
import ShoppingCart from "./components/shoppingCart/ShoppingCart";
import AddButton from "./components/shoppingCart/AddButton";
import SubNav from "./components/SubNav"

const app = createApp({
    components: {
        'app': App,
        'c-button': CButton,
        'dropdown': Dropdown,
        'users-table': UsersTable,
        'products-table': ProductsTable,
        'card-product': CardProduct,
        'rewind-icon': RewindIcon(),
        'shopping-cart-icon': ShoppingCartIcon,
        'star-icon': StarIcon,
        'shopping-bag-icon': ShoppingBagIcon,
        'add-button': AddButton,
        'shopping-cart': ShoppingCart,
        'sub-nav': SubNav,
    },
})
app.mount('#app');
