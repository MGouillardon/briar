<script setup>
import EmptyState from "@/Components/UI/EmptyState.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Price from "@/Components/Price.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    notifications: Object,
});
</script>

<template>
    <h1 class="text-3xl my-4">Your Notifications</h1>
    <section
        v-if="notifications.data.length"
        class="text-gray-700 dark:text-gray-400"
    >
        <div
            v-for="notification in notifications.data"
            :key="notification.id"
            class="border-b border-gray-200 dark:border-gray-800 py-4 flex justify-between items-center"
        >
            <div>
                <span
                    v-if="notification.type === 'App\\Notifications\\OfferMade'"
                >
                    Offer <Price :price="notification.data.amount" /> for
                    <Link
                        class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300"
                        :href="
                            route('realtor.property.show', {
                                property: notification.data.property_id,
                            })
                        "
                    >
                        property
                    </Link>
                    was made.
                </span>
            </div>
            <div>
                <Link
                    v-if="!notification.read_at"
                    method="put"
                    as="button"
                    :href="route('notification.mark-as-read', { notification: notification.id })"
                    class="btn-outline text-xs font-medium uppercase"
                >
                    Mark as read
                </Link>
            </div>
        </div>
        <Pagination :links="notifications.links" />
    </section>
    <EmptyState v-else class="mt-12">
        You don't have any notifications yet.
    </EmptyState>
</template>
