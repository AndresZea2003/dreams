<template></template>

<script>
import { token, routes, shoppingCartItems } from './use';
export default {
    props: { csrf: { type: String, required: true }, routes: { type: Object, required: true } },
    setup(props) {
        token.value = props.csrf;
        routes.value = props.routes.attributes;
        shoppingCartItems.value = JSON.parse(localStorage.getItem('products') ?? '[]');
        console.log(shoppingCartItems.value)
    },
};
</script>
