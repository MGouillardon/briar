<script setup>
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import ErrorMessage from "@/Components/ErrorMessage.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, computed, watch } from "vue";
import { debounce } from "lodash";

const props = defineProps({
    propertyId: {
        type: Number,
        required: true,
    },
    price: {
        type: Number,
        required: true,
    },
});

const form = useForm({
    amount: props.price,
});

const submit = () =>
    form.post(route("property.offer.store", { property: props.propertyId }), {
        preserveScroll: true,
        preserveState: true,
    });

const difference = computed(() => form.amount - props.price);

const min = computed(() => Math.round(props.price / 2));

const max = computed(() => Math.round(props.price * 2));

const emit = defineEmits(["offerUpdated"]);

watch(
    () => form.amount,
    debounce((value) => emit("offerUpdated", value), 200)
);
</script>

<template>
    <Box>
        <template #header> Make an Offer </template>
        <div>
            <form @submit.prevent="submit">
                <input v-model.number="form.amount" class="input" type="text" />
                <input
                    v-model.number="form.amount"
                    class="w-full mt-2 h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    type="range"
                    :min="min"
                    :max="max"
                    step="10000"
                />
                <button class="btn-outline w-full mt-2 text-sm" type="submit">
                    Make an Offer
                </button>
                <ErrorMessage :errors="form.errors" class="mt-2" />
            </form>
        </div>
        <div class="flex justify-between text-gray-500 mt-2">
            <div>Difference</div>
            <div>
                <Price class="font-medium" :price="difference" />
            </div>
        </div>
    </Box>
</template>
