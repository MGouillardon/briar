<script setup>
import EditForm from "@/Components/Forms/EditForm.vue";

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
