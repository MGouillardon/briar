<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import ErrorMessage from "@/Components/ErrorMessage.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <form @submit.prevent="submit">
        <div class="w-1/2 mx-auto mt-24">
            <ApplicationLogo class="w-20 h-20 mb-4 mx-auto text-gray-500 dark:text-white fill-current" />
            <div>
                <label for="name" value="Name" class="label">Name</label>

                <input
                    id="name"
                    type="text"
                    class="input"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <ErrorMessage class="mt-2" :error="form.errors.name" />
            </div>

            <div class="mt-4">
                <label for="email" value="Email" class="label">Email</label>

                <input
                    id="email"
                    type="email"
                    class="input"
                    v-model="form.email"
                    required
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
                    autocomplete="new-password"
                />

                <ErrorMessage class="mt-2" :error="form.errors.password" />
            </div>

            <div class="mt-4">
                <label
                    for="password_confirmation"
                    value="Confirm Password"
                    class="label"
                    >Password Confirmation</label
                >

                <input
                    id="password_confirmation"
                    type="password"
                    class="input"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <ErrorMessage
                    class="mt-2"
                    :error="form.errors.password_confirmation"
                />
            </div>

            <div class="flex items-center justify-end mt-4 space-x-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <button
                    class="btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </button>
            </div>
        </div>
    </form>
</template>
