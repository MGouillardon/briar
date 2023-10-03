<script setup>
import { useForm } from "@inertiajs/vue3";
import { watch } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";

const props = defineProps({
    filter: Object,
    href: String,
});

const form = useForm({
    search: null,
});

watch(
    form,
    debounce(() => {
        router.get(props.href, form, {
            preserveState: true,
            preserveScroll: true,
        });
    }, 500)
);
</script>

<template>
    <form class="my-8" @submit.prevent="search">
        <label
            for="search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
            >Search</label
        >
        <div class="relative">
            <div
                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
            >
                <svg
                    class="w-4 h-4 text-gray-500 dark:text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 20"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                    />
                </svg>
            </div>
            <input
                v-model="form.search"
                type="search"
                id="search"
                class="input-filter rounded-md w-full pl-12"
                placeholder="Search Properties..."
                required
            />
        </div>
    </form>
</template>

<style scoped>
#search::-webkit-search-cancel-button{
    appearance: none;  
}
</style>

