<template></template>

<script>
import { token, routes } from './use';
export default {
    props: { csrf: { type: String, required: true }, routes: { type: Object, required: true } },
    setup(props) {
        token.value = props.csrf;
        routes.value = props.routes.attributes;
    },
};
</script>
