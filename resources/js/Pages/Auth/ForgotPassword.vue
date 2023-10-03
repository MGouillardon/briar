<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/ErrorMessage.vue';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
        <Head title="Forgot Password" />
        <div class="w-1/2 mx-auto mt-24">

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <label for="email" value="Email" class="label">Email</label>

                <input
                    id="email"
                    type="email"
                    class="input"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <ErrorMessage class="mt-2" :error="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </div>

</template>
