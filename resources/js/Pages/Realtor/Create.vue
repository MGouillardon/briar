<script setup>
import CreateForm from "@/Components/Forms/CreateForm.vue";

const props = defineProps({
    options: Object,
});
</script>

<template>
    <CreateForm :options="options" :route="route('realtor.property.store')" />
</template>
