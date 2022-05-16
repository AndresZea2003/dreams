<script setup="props">
import { ref } from 'vue';
const props = defineProps({
    users: { type: String, required: true },
});
const userRecent = ref(JSON.parse(props.users).pop())
</script>
<template>
    <div>
        {{ userRecent.name}}
    </div>
</template>

