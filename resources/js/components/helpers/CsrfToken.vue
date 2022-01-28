<template>
    <input type="hidden" name="_token" :value="token" />
</template>
<script>
import { token } from '../../use';

export default {
    setup() {
        return { token };
    },
};
</script>
