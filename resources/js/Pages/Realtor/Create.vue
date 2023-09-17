<script setup>
import CreateForm from "@/Components/CreateForm.vue";

const props = defineProps({
    options: Object,
});
</script>

<template>
    <CreateForm :options="options" :route="route('realtor.property.store')" />
</template>
