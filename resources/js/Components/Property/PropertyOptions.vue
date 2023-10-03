<script setup>
const props = defineProps({
    options: {
        type: Object,
        required: true,
    },
});
const optionKeys = Object.keys(props.options);
</script>

<template>
    <div>
        <span v-for="(key, index) in optionKeys" :key="key">
            {{ options[key] }}
            <span v-if="index < optionKeys.length - 1">• </span>
        </span>
    </div>
</template>