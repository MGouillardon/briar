<script setup>
import PropertyAddress from "@/Components/Property/PropertyAddress.vue";
import PropertySpace from "@/Components/Property/PropertySpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import EmptyState from "@/Components/UI/EmptyState.vue";
import Offer from "@/Pages/Realtor/Components/Offer.vue";
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({ property: Object });
const hasOffers = computed(() => props.property.offers.length);
</script>

<template>
    <div class="mb-4">
        <Link :href="route('realtor.property.index')">
            ← Go back to Properties
        </Link>
    </div>
    <section class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <EmptyState v-if="!hasOffers" class="flex md:col-span-7 items-center">
            No offers
        </EmptyState>

        <div v-else class="md:col-span-7 flex flex-col gap-4">
            <Offer
                v-for="offer in property.offers"
                :offer="offer"
                :property-price="property.price"
                :is-sold="property.sold"
                :key="offer.id"
            />
        </div>
        <div class="md:col-span-5">
            <Box>
                <template #header>Basic Info</template>
                <Price :price="property.price" class="text-2xl font-bold" />

                <PropertySpace :property="property" class="text-lg" />
                <PropertyAddress :property="property" class="text-gray-500" />
            </Box>
        </div>
    </section>
</template>
