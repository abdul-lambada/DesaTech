<script setup>
import { Head } from '@inertiajs/vue3';
import Home from '@/components/Home.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="DesaTech - Platform Digital Desa" />
    <Home />
</template>
