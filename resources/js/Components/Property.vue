<script setup>
import Box from "@/Components/UI/Box.vue";
import PropertySpace from "@/Components/PropertySpace.vue";
import PropertyAddress from "@/Components/PropertyAddress.vue";
import PropertyTitle from "@/Components/PropertyTitle.vue";
import Price from "@/Components/Price.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    property: {
        type: Object,
        required: true,
    },
    options: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Box>
        <div class="space-y-3">
            <Link :href="route('property.show', { property: property.id })">
            <PropertyTitle :property="property" class="text-lg text-gray-500 font-bold" />
            <PropertyAddress :property="property" class="text-lg" />
            <PropertySpace :property="property" class="text-gray-500" />
            <div class="flex items-center gap-1">
                <Price :price="property.price" class="text-2xl font-bold" />
            </div>
            </Link>
        </div>
    </Box>
</template>
