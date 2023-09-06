<script setup>
import {useForm} from '@inertiajs/vue3'

const form = useForm({
    title: null,
    description: null,
    area: 0,
    price: 0,
    rooms: 0,
    bedrooms: 0,
    floor: 0,
    city: null,
    address: null,
    zip_code: null,
    sold: false,
})
</script>

<template>
    <h1>Create</h1>
</template>