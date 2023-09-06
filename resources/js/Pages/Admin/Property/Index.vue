<script setup>
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    properties: Object,
});
</script>

<template>
    <h1 class="text-3xl text-center my-4">Les biens</h1>
    <table
        class="w-full my-10 text-lg text-center text-gray-500 dark:text-gray-400 bg-red-500 rounded-md overflow-hidden shadow-md"
    >
        <thead
            class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
            <tr class="text-lg">
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                v-for="property in properties.data"
                :key="property.id"
            >
                <td>{{ property.title }}</td>
                <td>{{ property.area }}m²</td>
                <td>{{ property.price }}€</td>
                <td>{{ property.city }}</td>
                <td></td>
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
