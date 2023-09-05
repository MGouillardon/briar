<script setup>
import Pagination from '@/Components/UI/Pagination.vue';

defineProps({
    properties: Object,
});
</script>

<template>
    <h1 class="text-3xl">Les biens</h1>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="property in properties.data" :key="property.id">
                <td>{{ property.title }}</td>
                <td>{{ property.area }}m²</td>
                <td>{{ property.price }}</td>
                <td>{{ property.city }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <Pagination :links="properties.links" />
</template>
