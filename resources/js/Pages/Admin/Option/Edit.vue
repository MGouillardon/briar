<script setup>
import { useForm } from "@inertiajs/vue3";
import FormFields from "@/Components/FormFields.vue";


const props = defineProps({
    option: Object,
});

const form = useForm({
    name: props.option.name,
});

const formFields = [
    { name: "name", label: "Name", type: "text" },
];
const isEditForm = true;

const update = () => {
    form.put(route('admin.option.update', {option: props.option.id}))
};

</script>
<template>
    <div class="pt-12">
        <form @submit.prevent="update">
            <FormFields
                :formFields="formFields"
                :form="form"
                :isEditForm="isEditForm"
            />
        </form>
    </div>
</template>

