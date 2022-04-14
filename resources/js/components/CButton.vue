<template>
    <button @click="add" class="bg-red-400 my-10">
        Add Button
    </button>
    <p>Datos agregados al carrito: {{ counter }}</p>
    <p v-if="counter >= 10">Logrado :D</p>

    <button @click="counter -= 1" class="bg-red-400 my-10">
        Delete Button
    </button>
    <br>

    <button @click="togglez" class="bg-green-400 my-10">
        Mostrar
    </button>
    <br>

    <button @click="alerta('Hola')" class="bg-yellow-400 my-10">
        Hola
    </button>
    <br>

    <button @click="alerta('Adios')" class="bg-pink-400 my-10">
        Adios
    </button>
    <br>

    <button @click="addLocal()" class="bg-pink-400 my-10">
        Agg Nombre a localStorage
    </button>
    <br>

    <button @click="getLocal()" class="bg-pink-400 my-10">
        Mostrar todos los nombres de localStorage
    </button>
    <br>

    <div v-if="mostrar === true">
        <p>ME ESTAS VIENDO</p>
    </div>
    <br>

    <AddButton></AddButton>

</template>
<script setup>
import { ref } from "vue";
import AddButton from "./shoppingCart/AddButton";
import { actions } from "../use";

const counter = ref(0)
let mostrar = ref(false)

const togglez = () => {
    mostrar.value = !mostrar.value
    console.log(mostrar.value)
}
const add = () => {
    counter.value++
    console.log(counter.value)
}
const alerta = (mensaje) => {
    alert(mensaje)
}

const addLocal = () => {
    let name = prompt('Nombre para agregar al local Storage')
    localStorage.setItem('Nombres',name)
}

const getCartProducts = () =>{
    const raw = localStorage.getItem('products');
    return raw ? JSON.parse(raw) : [];
}
const products = getCartProducts()
console.log(products.length)
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
