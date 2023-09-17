<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import ErrorMessage from "@/Components/ErrorMessage.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div class="w-1/2 mx-auto mt-24">
            <div>
                <label class="label" for="email" value="Email">Email</label>

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

            <div class="mt-4">
                <label for="password" value="Password" class="label"
                    >Password</label
                >

                <input
                    id="password"
                    type="password"
                    class="input"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <ErrorMessage class="mt-2" :error="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400"
                        >Remember me</span
                    >
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 space-x-4">
                <Link
                    :href="route('register')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Don't have an account? Register
                </Link>
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>
                <button
                    class="btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </button>
            </div>
        </div>
    </form>
</template>
