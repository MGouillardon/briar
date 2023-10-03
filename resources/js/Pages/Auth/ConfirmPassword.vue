<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/ErrorMessage.vue';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
        <Head title="Confirm Password" />

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form @submit.prevent="submit">
            <div>
                <label for="password" value="Password" class="label" />
                <input
                    id="password"
                    type="password"
                    class="input"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    autofocus
                />
                <ErrorMessage class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
                <button class="ml-4 btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </button>
            </div>
        </form>
</template>
