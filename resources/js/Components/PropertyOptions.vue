<script setup>
defineProps({
    options: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <span v-for="(option, index) in options" :key="option.id">
            {{ option }}
            <span v-if="index != Object.keys(option).length - 1">• </span>
        </span>
    </div>
</template>
