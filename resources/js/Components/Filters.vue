<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    filters: Object,
    href: String,
});


const filterForm = useForm({
    price_from: props.filters.price_from ?? null,
    price_to: props.filters.price_to ?? null,
    bedrooms: props.filters.bedrooms ?? null,
    rooms: props.filters.rooms ?? null,
    floor: props.filters.floor ?? null,
    area_from: props.filters.area_from ?? null,
    area_to: props.filters.area_to ?? null,
});

const filter = () => {
    filterForm.get(props.href, {
        preserveState: true,
        preserveScroll: true,
    });
};

const reset = () => {
    filterForm.price_from = null;
    filterForm.price_to = null;
    filterForm.bedrooms = null;
    filterForm.rooms = null;
    filterForm.floor = null;
    filterForm.area_from = null;
    filterForm.area_to = null;
    filter();
};
</script>

<template>
    <form @submit.prevent="filter">
        <div class="my-8 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input
                    v-model.number="filterForm.price_from"
                    class="input-filter-l w-28"
                    type="text"
                    placeholder="Price from"
                />
                <input
                    v-model.number="filterForm.price_to"
                    class="input-filter-r w-28"
                    type="text"
                    placeholder="Price to"
                />
            </div>
            <div class="flex flex-nowrap items-center">
                <select v-model="filterForm.bedrooms" class="input-filter-l w-28">
                    <option :value="null">Bedrooms</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option :value="null">6+</option>
                </select>
                <select v-model="filterForm.rooms" class="input-filter w-28">
                    <option :value="null">Rooms</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option :value="null">6+</option>
                </select>
                <select v-model="filterForm.floor" class="input-filter-r w-28">
                    <option :value="null">Floor</option>
                    <option v-for="n in 3" :key="n" :value="n">{{ n }}</option>
                    <option :value="null">4+</option>
                </select>
            </div>
            <div class="flex flex-nowrap items-center">
                <input
                    v-model.number="filterForm.area_from"
                    class="input-filter-l w-28"
                    type="text"
                    placeholder="Area from"
                />
                <input
                    v-model.number="filterForm.area_to"
                    class="input-filter-r w-28"
                    type="text"
                    placeholder="Area to"
                />
            </div>
            <button class="btn-normal" type="submit">Filter</button>
            <button class="btn-normal" type="reset" @click="reset">
                Reset
            </button>
        </div>
    </form>
</template>
