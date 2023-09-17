<script setup>
import EditForm from "@/Components/EditForm.vue";

const props = defineProps({
    property: Object,
    options: Object,
    selectedOptions: Array,
});
</script>
<template>
    <EditForm
        :property="property"
        :options="options"
        :selectedOptions="selectedOptions"
        :route="
            route('realtor.property.update', { property: props.property.id })
        "
    />
</template>
