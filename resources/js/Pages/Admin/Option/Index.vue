<script setup>
import { Link } from "@inertiajs/vue3";
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    options: Object,
});

</script>

<template>
    <h1 class="text-3xl text-center mt-10">Les options</h1>
    <div class="relative flex flex-col items-center">
        <div class="w-full flex justify-end">
            <Link
                class="py-2 px-4 rounded-md bg-blue-500 text-gray-500 dark:bg-blue-700 dark:text-white hover:bg-blue-600 dark:hover:bg-blue-800"
                :href="route('admin.option.create')"
                >Ajouter une option</Link
            >
        </div>
        <table
            class="w-full table-fixed my-4 text-md text-center text-gray-500 dark:text-gray-40 rounded-md overflow-hidden shadow-md"
        >
            <thead
                class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr class="text-sm">
                    <th scope="col" class="px-3 py-3">Nom</th>
                    <th scope="col" class="px-3 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    v-for="option in options.data"
                    :key="option.id"
                >
                    <td
                        scope="row"
                        class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        {{ option.name }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="space-x-2">
                            <Link
                            class="btn-primary text-sm"
                            as="button"
                            :href="
                                route('admin.option.edit', {
                                    option: option.id,
                                })
                            "
                            >Edit</Link
                        >
                        <Link
                            class="btn-primary text-sm"
                            as="button"
                            :href="
                                route('admin.option.destroy', {
                                    option: option.id,
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
    </div>

    <section
        v-if="options.data.length"
        class="w-full flex justify-center mt-4 mb-4"
    >
        <Pagination :links="options.links" />
    </section>
</template>
