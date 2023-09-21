<script setup>
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";
import PropertyAddress from "@/Components/Property/PropertyAddress.vue";
import PropertySpace from "@/Components/Property/PropertySpace.vue";
import PropertyTitle from "@/Components/Property/PropertyTitle.vue";
import PropertyOptions from "@/Components/Property/PropertyOptions.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import MakeOffer from "@/Pages/Property/Components/MakeOffer.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination, Navigation, EffectCube } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const page = usePage();

const user = computed(() => page.props.auth.user);

const props = defineProps({
    property: {
        type: Object,
        required: true,
    },
    options: {
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
    <div
        class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4 pt-2 2xl:pt-8"
    >
        <Box
            class="md:col-span-7 flex w-full"
            :class="{ 'items-center': !property.images.length }"
        >
            <div v-if="property.images.length" class="w-full flex items-center">
                <Swiper
                    class="w-full h-full rounded-md"
                    :modules="[Pagination, Navigation]"
                    :pagination="true"
                    :navigation="true"
                >
                    <SwiperSlide
                        v-for="image in property.images"
                        :key="image.id"
                    >
                        <img
                            :src="image.src"
                            class="w-full h-full object-cover rounded-md"
                        />
                    </SwiperSlide>
                </Swiper>
            </div>
            <div v-else class="w-full text-center font-medium text-gray-500">
                No images
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header> Basic info </template>
                <Price
                    :price="property.price"
                    class="text-xl 2xl:text-3xl font-bold"
                />
                <PropertyTitle
                    :property="property"
                    class="text-lg text-gray-500 font-bold"
                />
                <PropertySpace
                    :property="property"
                    class="text-md 2xl:text-lg"
                />
                <PropertyAddress :property="property" class="text-gray-500" />
                <PropertyOptions :options="options" />
            </Box>
            <Box class="flex-grow">
                <template #header> Description </template>
                <div class="text-gray-500">
                    {{ property.description }}
                </div>
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
                        <Price
                            class="text-xl 2xl:text-3xl"
                            :price="monthlyPayment"
                        />
                    </div>
                    <div class="mt-2 text-gray-500 lg:text-sm text-md">
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
            <MakeOffer
                v-if="user"
                :property-id="property.id"
                :price="property.price"
            />
        </div>
    </div>
</template>

<style>
.swiper-pagination-bullet {
    background-color: rgb(55 65 81 / var(--tw-bg-opacity));
    width: 12px;
    height: 12px;
}
.swiper-pagination-bullet-active {
    background-color: rgb(55 65 81 / var(--tw-bg-opacity));
}

.swiper-button-prev:after,
.swiper-button-next:after {
    color: rgb(55 65 81 / var(--tw-bg-opacity));
}
</style>
