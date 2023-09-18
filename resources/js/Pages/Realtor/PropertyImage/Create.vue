<script setup>
defineProps({
    property: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <form enctype="multipart/form-data" method="post" :action="route('realtor.property.image.store', {property: property.id})">
        <input type="file" multiple name="images[]">
        <button type="submit">Upload</button>
    </form>
</template>