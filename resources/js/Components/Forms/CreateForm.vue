<script setup>
import { useForm } from "@inertiajs/vue3";
import FormFields from "@/Components/Forms/FormFields.vue";

const props = defineProps({
    options: Object,
    route: String,
});

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
    options: null,
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
const isEditForm = false;
const isPropertyForm = true;

const create = () => {
    form.post(props.route);
};
</script>

<template>
    <div class="pt-12">
        <form @submit.prevent="create">
            <FormFields
                :formFields="formFields"
                :form="form"
                :isEditForm="isEditForm"
                :isPropertyForm="isPropertyForm"
                :options="options"
            />
        </form>
    </div>
</template>

