<script setup>
import { Link } from "@inertiajs/vue3";
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import PropertySpace from "@/Components/Property/PropertySpace.vue";
import PropertyAddress from "@/Components/Property/PropertyAddress.vue";
import RealtorFilters from "@/Pages/Realtor/Components/RealtorFilters.vue";
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    properties: Object,
    filters: Object,
});
</script>

<template>
    <h1 class="text-3xl mb-4">Your Properties</h1>
    <section class="mb-4">
        <RealtorFilters :filters="filters" />
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box
            v-for="property in properties.data"
            :key="property.id"
            :class="{ 'border-dashed': property.deleted_at }"
        >
            <div
                class="flex flex-col md:flex-row gap-2 md:items-center justify-between"
            >
                <div :class="{ 'opacity-25': property.deleted_at }">
                    <div class="xl:flex items-center gap-2">
                        <Price
                            :price="property.price"
                            class="text-2xl font-medium"
                        />
                        <PropertySpace :property="property" />
                    </div>
                    <PropertyAddress
                        :property="property"
                        class="text-gray-500"
                    />
                </div>
                <section>
                    <div
                        class="flex items-center gap-1 text-gray-600 dark:text-gray-300"
                    >
                        <Link
                            class="btn-outline text-xs font-medium"
                            :href="
                                route('property.show', {
                                    property: property.id,
                                })
                            "
                            >Preview</Link
                        >
                        <Link
                            class="btn-outline text-xs font-medium"
                            :href="
                                route('realtor.property.edit', {
                                    property: property.id,
                                })
                            "
                            >Edit</Link
                        >
                        <Link
                            v-if="!property.deleted_at"
                            class="btn-outline text-xs font-medium"
                            :href="
                                route('realtor.property.destroy', {
                                    property: property.id,
                                })
                            "
                            as="button"
                            method="delete"
                        >
                            Delete
                        </Link>
                        <Link
                            v-else
                            class="btn-outline text-xs font-medium"
                            :href="
                                route('realtor.property.restore', {
                                    property: property.id,
                                })
                            "
                            as="button"
                            method="put"
                        >
                            Restore
                        </Link>
                    </div>
                    <div class="mt-2">
                        <Link
                            class="block w-full text-center btn-outline text-xs font-medium"
                            :href="
                                route('realtor.property.image.create', {
                                    property: property.id,
                                })
                            "
                        >
                            Images ({{ property.images_count }})
                        </Link>
                    </div>
                    <div class="mt-2">
                        <Link
                            class="block w-full text-center btn-outline text-xs font-medium"
                            :href="
                                route('realtor.property.show', {
                                    property: property.id,
                                })
                            "
                        >
                            Offers ({{ property.offers_count }})
                        </Link>
                    </div>
                </section>
            </div>
        </Box>
    </section>
    <section
        v-if="properties.data.length"
        class="w-full flex justify-center mt-4 mb-4"
    >
        <Pagination :links="properties.links" />
    </section>
</template>
