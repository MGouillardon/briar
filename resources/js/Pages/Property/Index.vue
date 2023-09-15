<script setup>
import Property from "@/Components/Property.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Filters from "@/Components/Filters.vue";
defineProps({
    properties: Object,
    filters: Object,
});
</script>

<template>
    <Filters :filters="filters" :href="route('property.index')" />
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Property
            v-for="property in properties.data"
            :key="property.id"
            :property="property"
        />
    </div>
    <div
    v-if="properties.data.length"
    class="w-full flex justify-center"
  >
    <Pagination :links="properties.links" />
  </div>
</template>
