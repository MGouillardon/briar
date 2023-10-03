<script setup>
import NavbarLayout from "@/Layouts/NavbarLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const flash = computed(() => page.props.flash.success)

</script>

<template>
    <NavbarLayout />
    <main class="container mx-auto p-4 w-full">
        <div
      v-if="flash"
      class="mb-4 border rounded-md shadow-sm text-center border-green-200 dark:border-green-800 bg-green-500 dark:bg-green-900 p-2"
    >
    
      {{ flash }}
    </div>
        <slot>Default</slot>
    </main>
</template>
