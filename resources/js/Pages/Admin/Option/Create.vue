<script setup>
import { useForm } from "@inertiajs/vue3";
import FormFields from "../Components/FormFields.vue";

const form = useForm({
    name: null,
});

const formFields = [
    { name: "name", label: "Name", type: "text" },
];
const isEditForm = false;

const create = () => {
    form.post(route("admin.option.store"));
};
</script>

<template>
    <div class="pt-12">
        <form @submit.prevent="create">
            <FormFields
                :formFields="formFields"
                :form="form"
                :isEditForm="isEditForm"
            />
        </form>
    </div>
</template>

