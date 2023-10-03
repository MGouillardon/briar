<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/ErrorMessage.vue';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
        <Head title="Reset Password" />

        <form @submit.prevent="submit">
            <div>
                <label class="label" for="email" value="Email" />

                <input
                    id="email"
                    type="email"
                    class="input"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <ErrorMessage class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <label class="label" for="password" value="Password" />

                <input
                    id="password"
                    type="password"
                    class="input"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <ErrorMessage class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <label class="label" for="password_confirmation" value="Confirm Password" />

                <input
                    id="password_confirmation"
                    type="password"
                    class="input"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <ErrorMessage class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </button>
            </div>
        </form>
</template>
