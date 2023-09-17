<script setup>
defineProps({
    property: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <span class="font-bold">{{ property.bedrooms }}</span> beds
        <span class="text-gray-400 mx-2">|</span>
        <span class="font-bold">{{ property.rooms }}</span> baths
        <span class="text-gray-400 mx-2">|</span>
        <span class="font-bold">{{ property.floor }}</span> floor
        <span class="text-gray-400 mx-2">|</span>
        <span class="font-bold">{{ property.area }}</span> m²
    </div>
</template>
