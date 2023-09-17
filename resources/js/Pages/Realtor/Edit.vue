<script setup>
import { useForm } from "@inertiajs/vue3";
import FormFields from "./Components/FormFields.vue";

const props = defineProps({
    property: Object,
    options: Object,
    selectedOptions: Array,
});

const form = useForm({
    title: props.property.title,
    description: props.property.description,
    area: props.property.area,
    price: props.property.price,
    rooms: props.property.rooms,
    bedrooms: props.property.bedrooms,
    floor: props.property.floor,
    city: props.property.city,
    address: props.property.address,
    zip_code: props.property.zip_code,
    sold: Boolean(props.property.sold),
    options: props.selectedOptions,
});

const formFields = [
    { name: "title", label: "Titre", type: "text" },
    { name: "area", label: "Surface", type: "number" },
    { name: "price", label: "Prix", type: "number" },
    { name: "description", label: "Description", type: "text" },
    { name: "rooms", label: "Pièces", type: "number" },
    { name: "bedrooms", label: "Chambres", type: "number" },
    { name: "floor", label: "Etage", type: "number" },
    { name: "city", label: "Ville", type: "text" },
    { name: "address", label: "Adresse", type: "text" },
    { name: "zip_code", label: "Code postal", type: "text" },
];
const isEditForm = true;
const isPropertyForm = true;

const update = () => {
    form.put(route("realtor.property.update", { property: props.property.id }));
};
</script>
<template>
    <div class="pt-12">
        <form @submit.prevent="update">
            <FormFields
                :formFields="formFields"
                :form="form"
                :isEditForm="isEditForm"
                :isPropertyForm="isPropertyForm"
                :options="options"
                :selectedOptions="selectedOptions"
            />
        </form>
    </div>
</template>

