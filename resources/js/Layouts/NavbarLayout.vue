<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <header
        class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full"
    >
        <div class="container mx-auto">
            <nav class="flex items-center justify-between p-4">
                <div class="">
                    <Link
                        href="/"
                        class="flex items-center space-x-3 text-xl font-bold text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                    >
                        <ApplicationLogo class="w-10 h-10 fill-current" />
                        <span class="">Briar</span>
                    </Link>
                </div>
                <div>
                    <ul class="flex items-center space-x-6">
                        <li>
                            <Link
                                :href="route('admin.property.index')"
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                >Mes biens</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="#"
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                >Logout</Link
                            >
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</template>
