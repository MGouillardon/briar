<script setup>
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    offer: Object,
    propertyPrice: Number,
});

const difference = computed(() => props.offer.amount - props.propertyPrice);

const madeOn = computed (() => {
    const date = new Date(props.offer.created_at);
    return `${date.toLocaleDateString()} ${date.toLocaleTimeString()}`;
});
</script>

<template>
    <Box>
        <template #header> Offer #{{ offer.id }}</template>
        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-xl font-medium" />
                <div class="text-gray-500">
                    Difference <Price :price="difference" />
                </div>
                <div class="text-gray-500 text-xs">
                    Made by John doe
                </div>
                <div class="text-gray-500 text-xs">
                    Made on {{ madeOn }}
                </div>
            </div>
            <div>
                <Link class="btn-outline text-xs font-medium" as="button"
                    >Accept</Link
                >
            </div>
        </section>
    </Box>
</template>
