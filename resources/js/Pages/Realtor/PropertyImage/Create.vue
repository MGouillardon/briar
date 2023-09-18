<script setup>
import Box from "@/Components/UI/Box.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3'

const props = defineProps({ property: Object });

router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})
const form = useForm({
    images: [],
});

const canUpload = computed(() => form.images.length > 0);

const upload = () => {
    form.post(
        route("realtor.property.image.store", { property: props.property.id }),
        {
            formData: true,
            onSuccess: () => form.reset(),

        }
    );
};
const addFiles = (event) => {
    for (const image of event.target.files) {
        form.images.push(image);
    }
};
const reset = () => form.reset();
</script>

<template>
    <Box>
        <template #header> Upload new Images </template>
        <form @submit.prevent="upload">
            <section class="flex items-center gap-2 my-4">
                <input
                    class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-500 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-gray-100 file:dark:bg-gray-700 file:rounded-md file:shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 file:hover:bg-gray-200 file:dark:hover:bg-gray-600 file:disabled:bg-gray-200 file:disabled:dark:bg-gray-600 file:disabled:text-gray-400 file:disabled:cursor-not-allowed"
                    type="file"
                    multiple
                    @input="addFiles"
                />
                <button
                    class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed"
                    type="submit"
                    :disabled="!canUpload"
                >
                    Upload
                </button>
                <button class="btn-outline" type="reset" @click="reset">
                    Reset
                </button>
            </section>
        </form>
    </Box>
    <Box class="mt-4" v-if="property.images.length">
        <template #header> Current property images </template>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div v-for="image in props.property.images" :key="image.id">
                <img
                    :src="image.src"
                    :alt="image.alt"
                    class="w-full h-48 object-cover rounded-md"
                />
            </div>
        </section>
    </Box>
</template>
