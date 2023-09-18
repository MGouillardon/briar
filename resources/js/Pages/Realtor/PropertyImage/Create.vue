<script setup>
import Box from "@/Components/UI/Box.vue";
import { useForm } from "@inertiajs/vue3";
const props = defineProps({ property: Object });
const form = useForm({
    images: [],
});
const upload = () => {
    form.post(
        route("realtor.property.image.store", { property: props.property.id }),
        {
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
            <input type="file" multiple @input="addFiles" />
            <button class="btn-outline" type="submit">Upload</button>
            <button class="btn-outline" type="reset" @click="reset">
                Reset
            </button>
        </form>
    </Box>
</template>
