import { computed, isRef } from "vue";
export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const price = isRef(total) ? total.value : total;
        const rate =
            (isRef(interestRate) ? interestRate.value : interestRate) /
            100 /
            12;
        const months = (isRef(duration) ? duration.value : duration) * 12;

        return (price * rate) / (1 - Math.pow(1 + rate, -months));
    });

    const totalPaid = computed(() => {
        return (
            (isRef(duration) ? duration.value : duration) *
            12 *
            monthlyPayment.value
        );
    });

    const totalInterest = computed(() => {
        return totalPaid.value - (isRef(total) ? total.value : total);
    });

    return { monthlyPayment, totalPaid, totalInterest };
};
