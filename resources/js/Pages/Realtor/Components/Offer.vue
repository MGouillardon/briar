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

const madeOn = computed(() => {
    const date = new Date(props.offer.created_at);
    return `${date.toLocaleDateString()} ${date.toLocaleTimeString()}`;
});
</script>

<template>
    <Box>
        <template #header>
            Offer #{{ offer.id }}
            <span class="dark:bg-green-900 dark:text-green-200 bg-green-200 text-green-900 ml-1 px-2 py-1 rounded-full text-xs font-medium"
             v-if="offer.accepted_at">
                accepted
            </span>
            </template>
        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-xl font-medium" />
                <div class="text-gray-500">
                    Difference <Price :price="difference" />
                </div>
                <div class="text-gray-500 text-xs">
                    Made by {{ offer.bidder.name }}
                </div>
                <div class="text-gray-500 text-xs">Made on {{ madeOn }}</div>
            </div>
            <div>
                <Link
                    v-if="!offer.accepted_at && !offer.rejected_at" 
                    class="btn-outline text-xs font-medium"
                    as="button"
                    method="put"
                    :href="route('realtor.offer.accept', { offer: offer.id })"
                    >Accept</Link
                >
            </div>
        </section>
    </Box>
</template>
