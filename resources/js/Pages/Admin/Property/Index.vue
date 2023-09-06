<script setup>
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    properties: Object,
});
</script>

<template>
    <h1 class="text-3xl text-center my-4">Les biens</h1>
    <div class="relative overflow-x-auto">
        <table
            class="w-full table-fixed my-10 text-md text-center text-gray-500 dark:text-gray-40 rounded-md overflow-hidden shadow-md"
        >
            <thead
                class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr class="text-md">
                    <th scope="col" class="px-6 py-3">Titre</th>
                    <th scope="col" class="px-6 py-3">Surface</th>
                    <th scope="col" class="px-6 py-3">Prix</th>
                    <th scope="col" class="px-6 py-3">Ville</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
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
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        {{ property.title }}
                    </td>
                    <td class="px-6 py-4">{{ property.area }}m²</td>
                    <td class="px-6 py-4">{{ property.price }}€</td>
                    <td class="px-6 py-4">{{ property.city }}</td>
                    <td class="px-6 py-4"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <section
        v-if="properties.data.length"
        class="w-full flex justify-center mt-4 mb-4"
    >
        <Pagination :links="properties.links" />
    </section>
</template>
