<script setup>
import Property from "@/Components/Property/Property.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Filters from "@/Components/Filters.vue";
import SearchBar from "@/Components/UI/SearchBar.vue";
import EmptyState from "@/Components/UI/EmptyState.vue";
defineProps({
    properties: Object,
    filters: Object,
});
</script>

<template>
    <div class="flex flex-wrap items-center justify-between">
        <Filters :filters="filters" :href="route('property.index')" />
        <SearchBar :filter="filters.search" :href="route('property.index')" />
    </div>
    <EmptyState v-if="!properties.data.length" class="mt-12">
        There are no properties matching your search.
    </EmptyState>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Property
            v-for="property in properties.data"
            :key="property.id"
            :property="property"
        />
    </div>
    <div v-if="properties.data.length" class="w-full flex justify-center">
        <Pagination :links="properties.links" />
    </div>
</template>
