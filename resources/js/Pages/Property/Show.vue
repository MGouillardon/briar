<script setup>
import { ref } from "vue";
import PropertyAddress from "@/Components/PropertyAddress.vue";
import PropertySpace from "@/Components/PropertySpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";

const props = defineProps({
    property: {
        type: Object,
        required: true,
    },
});

const interestRate = ref(2.5);
const duration = ref(25);

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
    props.property.price,
    interestRate,
    duration
);
</script>

<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4 pt-20">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">
                No images
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header> Basic info </template>
                <Price :price="property.price" class="text-2xl font-bold" />
                <PropertySpace :property="property" class="text-lg" />
                <PropertyAddress :property="property" class="text-gray-500" />
            </Box>
            <Box>
                <template #header> Monthly payment </template>
                <div>   
                    <label class="label"
                        >Interest rate ({{ interestRate }} %)</label
                    >
                    <input
                        v-model.number="interestRate"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        type="range"
                        min="0.1"
                        max="30"
                        step="0.1"
                    />
                    <label class="label">Duration ({{ duration }} years)</label>
                    <input
                        v-model.number="duration"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        type="range"
                        min="3"
                        max="35"
                        step="1"
                    />
                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">Your monthly payment</div>
                        <Price class="text-3xl" :price="monthlyPayment" />
                    </div>
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Total Paid</div>
                            <div>
                                <Price class="font-medium" :price="totalPaid" />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Principal paid</div>
                            <div>
                                <Price
                                    class="font-medium"
                                    :price="property.price"
                                />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Interest paid</div>
                            <div>
                                <Price
                                    class="font-medium"
                                    :price="totalInterest"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>