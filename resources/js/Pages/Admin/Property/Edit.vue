<script setup>
import EditForm from "@/Components/Forms/EditForm.vue";

const props = defineProps({
    property: Object,
    options: Object,
    selectedOptions: Array,
});
</script>
<template>
    <EditForm
        :property="property"
        :options="options"
        :selectedOptions="selectedOptions"
        :route="route('admin.property.update', { property: props.property.id })"
    />
</template>

<!-- <template>
    {{ form.sold }}
    <div class="pt-12">
        <form @submit.prevent="update">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label class="label" for="title">Titre</label>
                    <input v-model="form.title" type="text" class="input" />
                    <ErrorMessage
                        v-if="form.errors.title"
                        :error="form.errors.title"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="area">Surface</label>
                    <input v-model="form.area" type="number" class="input" />
                    <ErrorMessage
                        v-if="form.errors.area"
                        :error="form.errors.area"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="price">Prix</label>
                    <input v-model="form.price" type="number" class="input" />
                    <ErrorMessage
                        v-if="form.errors.price"
                        :error="form.errors.price"
                    />
                </div>
                <div class="col-span-12">
                    <label class="label" for="description">Description</label>
                    <textarea
                        v-model="form.description"
                        type="text"
                        class="input resize-none"
                    >
                    </textarea>
                    <ErrorMessage
                        v-if="form.errors.description"
                        :error="form.errors.description"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="rooms">Pièces</label>
                    <input v-model="form.rooms" type="number" class="input" />
                    <ErrorMessage
                        v-if="form.errors.rooms"
                        :error="form.errors.rooms"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="bedrooms">Chambres</label>
                    <input
                        v-model="form.bedrooms"
                        type="number"
                        class="input"
                    />
                    <ErrorMessage
                        v-if="form.errors.bedrooms"
                        :error="form.errors.bedrooms"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="floor">Etage</label>
                    <input v-model="form.floor" type="number" class="input" />
                    <ErrorMessage
                        v-if="form.errors.floor"
                        :error="form.errors.floor"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="city">Ville</label>
                    <input v-model="form.city" type="text" class="input" />
                    <ErrorMessage
                        v-if="form.errors.city"
                        :error="form.errors.city"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="address">Adresse</label>
                    <input v-model="form.address" type="text" class="input" />
                    <ErrorMessage
                        v-if="form.errors.address"
                        :error="form.errors.address"
                    />
                </div>
                <div class="col-span-4">
                    <label class="label" for="zip_code">Code postal</label>
                    <input v-model="form.zip_code" type="text" class="input" />
                    <ErrorMessage
                        v-if="form.errors.zip_code"
                        :error="form.errors.zip_code"
                    />
                </div>
                <div class="col-span-2">
                    <div
                        class="input pl-4 border border-gray-200 rounded dark:border-gray-700"
                    >
                        <input
                            id="isSold"
                            type="checkbox"
                            value=""
                            name="isSold"
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
                    <button type="submit" class="btn-primary">Edit</button>
                </div>
            </div>
        </form>
    </div>
</template> -->
