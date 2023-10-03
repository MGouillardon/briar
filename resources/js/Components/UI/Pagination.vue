<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({ links: Array });
</script>

<template>
    <div class="flex gap-1 absolute left-1/2 transform -translate-x-1/2 bottom-8">
        <Link
            v-for="(link, index) in links"
            :key="index"
            class="py-2 px-4 rounded-md"
            :href="link.url ? link.url : '#'"
            :class="{
                'bg-indigo-500 text-white dark:bg-indigo-700 dark:text-indigo-300':
                    link.active,
            }"
        >
            <div v-html="link.label"></div>
        </Link>
    </div>
</template>
