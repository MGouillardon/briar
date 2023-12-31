<script setup>
import ApplicationLogo from "@/Components/Icons/ApplicationLogo.vue";
import NotificationIcon from "@/Components/Icons/NotificationIcon.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);
const admin = computed(() => page.props.auth.user.is_admin);
const notificationsCount = computed(() => page.props.auth.notificationCount);
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
                <div class="flex items-center space-x-6">
                    <ul
                        v-if="user && admin"
                        class="flex items-center space-x-6"
                    >
                        <li>
                            <Link
                                :href="route('admin.property.index')"
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                :class="
                                    page.url === '/admin/property'
                                        ? 'opacity-80'
                                        : ''
                                "
                                >Gérer mes biens</Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="route('admin.option.index')"
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                :class="
                                    page.url === '/admin/option'
                                        ? 'opacity-80'
                                        : ''
                                "
                                >Gérer mes options</Link
                            >
                        </li>
                    </ul>
                    <ul class="flex items-center space-x-6">
                        <li v-if="!user">
                            <Link
                                :href="route('login')"
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                method="get"
                                >Login</Link
                            >
                        </li>
                        <li v-if="!user">
                            <Link
                                :href="route('register')"
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                method="get"
                                >Register</Link
                            >
                        </li>
                        <li v-else class="flex items-center space-x-6">
                            <Link
                                :href="route('notification.index')"
                                class="relative pr-2 py-2"
                            >
                                <NotificationIcon />
                                <div
                                    v-if="notificationsCount"
                                    class="absolute top-0 right-0 w-5 h-5 bg-red-500 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center"
                                >
                                    <span v-if="notificationsCount > 9">
                                        9+
                                    </span>
                                    <span v-else>
                                        {{ notificationsCount }}
                                    </span>
                                </div>
                            </Link>
                            <Link
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                :href="route('realtor.property.index')"
                            >
                                {{ user.name }}
                            </Link>
                            <Link
                                class="btn-primary"
                                :href="route('realtor.property.create')"
                            >
                                + New listing
                            </Link>
                            <Link
                                :href="route('logout')"
                                class="text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                method="post"
                                as="button"
                                >Logout</Link
                            >
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</template>
