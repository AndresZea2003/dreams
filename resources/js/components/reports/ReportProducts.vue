<script setup="props">
import { ref } from 'vue';
const props = defineProps({
    products: { type: String, required: true },
});
const productRecent = ref(JSON.parse(props.products).pop());
</script>
<template>
    <div>
        {{ productRecent.name }}
    </div>
</template>
