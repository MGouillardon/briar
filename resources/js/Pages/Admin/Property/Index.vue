<script setup>
import { Link } from "@inertiajs/vue3";
import Pagination from "@/Components/UI/Pagination.vue";
import Filters from "@/Components/Filters.vue";

defineProps({
    properties: Object,
    filters: Object,
});

const formatPrice = (price) => {
    return new Intl.NumberFormat("fr-FR", {
        style: "currency",
        currency: "EUR",
        maximumFractionDigits: 0,
        minimumFractionDigits: 0,
    }).format(price);
};
</script>

<template>
    <div class="flex items-center justify-between">
        <Filters :filters="filters" :href="route('admin.property.index')" />
        <Link class="btn-primary" :href="route('admin.property.create')"
            >Ajouter un bien</Link
        >
    </div>
    <table
        class="w-full table-fixed my-4 text-md text-center text-gray-500 dark:text-gray-40 rounded-md overflow-hidden shadow-md"
    >
        <thead
            class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
            <tr class="text-xs 2xl:text-sm">
                <th scope="col" class="px-3 py-3">Titre</th>
                <th scope="col" class="px-3 py-3">Surface</th>
                <th scope="col" class="px-3 py-3">Prix</th>
                <th scope="col" class="px-3 py-3">Ville</th>
                <th scope="col" class="px-3 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                v-for="property in properties.data"
                :key="property.id"
            >
                <td
                    scope="row"
                    class="px-6 py-2.5 2xl:py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                    {{ property.title }}
                </td>
                <td class="px-6 py-2.5 2xl:py-3">{{ property.area }}m²</td>
                <td class="px-6 py-2.5 2xl:py-3">
                    {{ formatPrice(property.price) }}
                </td>
                <td class="px-6 py-2.5 2xl:py-3">{{ property.city }}</td>
                <td class="px-6 py-2.5 2xl:py-3">
                    <div class="space-x-2">
                        <Link
                            class="btn-primary text-xs 2xl:text-sm"
                            as="button"
                            :href="
                                route('admin.property.edit', {
                                    property: property.id,
                                })
                            "
                            >Edit</Link
                        >
                        <Link
                            class="btn-primary text-xs 2xl:text-sm"
                            as="button"
                            :href="
                                route('admin.property.destroy', {
                                    property: property.id,
                                })
                            "
                            method="delete"
                            >Delete</Link
                        >
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <section
        v-if="properties.data.length"
        class="w-full flex justify-center mt-4 mb-4"
    >
        <Pagination :links="properties.links" />
    </section>
</template>
