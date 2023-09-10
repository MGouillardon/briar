<script setup>
import ErrorMessage from "@/Components/ErrorMessage.vue";
defineProps({
    formFields: Array,
    form: Object,
    isEditForm: Boolean,
});

</script>
<template>
        <div class="grid grid-cols-12 gap-4">
            <div
                v-for="field in formFields"
                :key="field.name"
                :class="
                    field.name === 'description' || field.name === 'name' ? 'col-span-12' : 'col-span-4'
                "
            >
                <label class="label" :for="field.name">{{ field.label }}</label>
                <textarea
                    v-if="field.name === 'description'"
                    v-model="form.description"
                    type="text"
                    class="input resize-none"
                ></textarea>
                <input
                    v-else
                    v-model="form[field.name]"
                    :type="field.type"
                    class="input"
                    :id="field.name"
                />
                <ErrorMessage
                    v-if="form.errors[field.name]"
                    :error="form.errors[field.name]"
                />
            </div>
            <div v-if="isEditForm && !form.name" class="col-span-2">
                <div
                    class="input pl-4 border border-gray-200 rounded dark:border-gray-700"
                >
                    <input
                        id="isSold"
                        type="checkbox"
                        name="isSold"
                        v-model="form.sold"
                        :checked="form.sold"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                    <label
                        for="isSold"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Vendu</label
                    >
                </div>
            </div>
            <div class="col-span-12">
                <button type="submit" class="btn-primary">
                    {{ isEditForm ? "Edit" : "Créer" }}
                </button>
            </div>
        </div>
</template>
