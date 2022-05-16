<template>
    <button @click="add" class="my-10 bg-red-400">Add Button</button>
    <p>Datos agregados al carrito: {{ counter }}</p>
    <p v-if="counter >= 10">Logrado :D</p>

    <button @click="counter -= 1" class="my-10 bg-red-400">Delete Button</button>
    <br />

    <button @click="togglez" class="my-10 bg-green-400">Mostrar</button>
    <br />

    <button @click="alerta('Hola')" class="my-10 bg-yellow-400">Hola</button>
    <br />

    <button @click="alerta('Adios')" class="my-10 bg-pink-400">Adios</button>
    <br />

    <button @click="addLocal()" class="my-10 bg-pink-400">Agg Nombre a localStorage</button>
    <br />

    <button @click="getLocal()" class="my-10 bg-pink-400">Mostrar todos los nombres de localStorage</button>
    <br />

    <div v-if="mostrar === true">
        <p>ME ESTAS VIENDO</p>
    </div>
    <br />

    <AddButton></AddButton>
</template>
<script setup>
import { ref } from 'vue';
import AddButton from './shoppingCart/AddButton';
import { actions } from '../use';

const counter = ref(0);
let mostrar = ref(false);

const togglez = () => {
    mostrar.value = !mostrar.value;
};
const add = () => {
    counter.value++;
};
const alerta = (mensaje) => {
    alert(mensaje);
};

const addLocal = () => {
    let name = prompt('Nombre para agregar al local Storage');
    localStorage.setItem('Nombres', name);
};

const getCartProducts = () => {
    const raw = localStorage.getItem('products');
    return raw ? JSON.parse(raw) : [];
};
const products = getCartProducts();
</script>
<!--<script>-->

<!--export default {-->

<!--    data() {-->
<!--        return {-->
<!--            counter: 0,-->
<!--            mostrar: false,-->
<!--        }-->
<!--    },-->

<!--methods: {-->
<!--    toggle: function () {-->
<!--        this.mostrar = !this.mostrar-->
<!--    },-->
<!--    alert: function (mensaje) {-->
<!--        alert(mensaje)-->
<!--    },-->
<!--    add: function () {-->
<!--        let counter = 0-->
<!--        counter = counter + 1-->
<!--        console.log(counter)-->
<!--    },-->
<!--    addLocal: function ()-->
<!--    {-->
<!--        let name = prompt('Nombre para agregar al local Storage')-->
<!--        localStorage.setItem('Nombres',name)-->
<!--    },-->
<!--    getLocal: function ()-->
<!--    {-->
<!--        const names = localStorage.getItem('Nombres')-->
<!--        return names-->
<!--    }-->

<!--}-->

<!--}-->
<!--</script>-->
