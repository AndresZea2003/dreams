require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';
import CButton from './components/CButton';
import Dropdown from './components/Dropdown';
import UsersTable from './components/UsersTable';
import ProductsTable from './components/ProductsTable';
import CardProduct from './components/CardProduct';
import { RewindIcon, MoonIcon } from '@heroicons/vue/solid';
import { ShoppingCartIcon, StarIcon, ShoppingBagIcon } from '@heroicons/vue/outline';
import ShoppingCart from './components/shoppingCart/ShoppingCart';
import AddButton from './components/shoppingCart/AddButton';
import SubNav from './components/SubNav';
import InvoiceCart from './components/shoppingCart/InvoiceCart';
import PaymentCart from './components/shoppingCart/PaymentCart';
import PaymentsTable from './components/PaymentsTable';
import ReportProducts from './components/reports/ReportProducts';
import ReportUsers from './components/reports/ReportUsers';
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
        'moon-icon': MoonIcon,
        'add-button': AddButton,
        'shopping-cart': ShoppingCart,
        'sub-nav': SubNav,
        'invoice-cart': InvoiceCart,
        'payment-cart': PaymentCart,
        'payments-table': PaymentsTable,
        'report-products': ReportProducts,
        'report-users': ReportUsers,
    },
});
app.mount('#app');
