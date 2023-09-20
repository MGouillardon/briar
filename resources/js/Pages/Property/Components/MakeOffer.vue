<script setup>
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, computed } from "vue";

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

const difference = computed(() => form.amount - props.price);

const min = computed(() => props.price / 2);

const max = computed(() => props.price * 2);
</script>

<template>
    <Box>
        <template #header> Make an Offer </template>
        <div>
            <form>
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
