<script setup>
import NavbarLayout from "@/Layouts/NavbarLayout.vue";
</script>

<template>
    <NavbarLayout />
    <main class="container mx-auto p-4 w-full">
        <slot>Default</slot>
    </main>
</template>
