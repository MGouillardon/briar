<script setup>
import { reactive, watch, computed } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";

const props = defineProps({
    filters: Object,
});

const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters.by ?? "created_at",
    order: props.filters.order ?? "asc",
});


watch(
    filterForm,
    debounce(() => {
        router.get(route("realtor.property.index"), filterForm, {
            preserveState: true,
            preserveScroll: true,
        });
    }, 1000)
);

const sortLabels = {
    created_at: [
        { label: "Oldest", value: "asc" },
        { label: "Latest", value: "desc" },
    ],
    price: [
        { label: "Highest", value: "desc" },
        { label: "Lowest", value: "asc" },
    ],
};

const sortOptions = computed(() => {
    return sortLabels[filterForm.by];
});
</script>

<template>
    <form>
        <div class="mb-4 mt-4 flex flex-wrap gap-4">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    v-model="filterForm.deleted"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                    name="deleted"
                    type="checkbox"
                />
                <label for="deleted">Deleted</label>
            </div>
            <div>
                <select v-model="filterForm.by" class="input-filter-l w-24">
                    <option value="created_at">Added</option>
                    <option value="price">Price</option>
                </select>
                <select v-model="filterForm.order" class="input-filter-r w-32">
                    <option
                        v-for="option in sortOptions"
                        :key="option.value"
                        :value="option.value"
                    >
                        {{ option.label }}
                    </option>
                </select>
            </div>
        </div>
    </form>
</template>
