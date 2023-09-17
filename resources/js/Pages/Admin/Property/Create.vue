<script setup>
import CreateForm from "@/Components/CreateForm.vue";

const props = defineProps({
    options: Object,
});

const create = () => {
    form.post(route("admin.property.store"));
};
</script>

<template>
    <CreateForm :options="options" :route="route('admin.property.store')" />
</template>

<!-- <template>
    <div class="pt-12">
        <form @submit.prevent="create">
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
               
                <div class="col-span-12">
                    <button type="submit" class="btn-primary">Créer</button>
                </div>
            </div>
        </form>
    </div>
</template> -->
