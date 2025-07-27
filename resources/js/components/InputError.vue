<script setup>
defineProps({
    message: {
        type: [String, Array],
        default: '',
    },
});
</script>

<template>
    <div v-show="message && (Array.isArray(message) ? message.length : true)">
        <template v-if="Array.isArray(message)">
            <p v-for="(msg, i) in message" :key="i" class="text-sm text-red-600">{{ msg }}</p>
        </template>
        <template v-else>
            <p class="text-sm text-red-600">{{ message }}</p>
        </template>
    </div>
</template>
