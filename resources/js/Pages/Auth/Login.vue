<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import Checkbox from '@/components/Checkbox.vue';
import GuestLayout from '@/layouts/GuestLayout.vue';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TextInput from '@/components/TextInput.vue';

const router = useRouter();

const form = ref({
    email: '',
    password: '',
    remember: false,
});

const errors = ref({});
const processing = ref(false);
const status = ref('');

const submit = async () => {
    processing.value = true;
    errors.value = {};

    try {
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(form.value),
        });

        // Debug: log response text sebelum parsing JSON
        const rawText = await response.text();
        try {
            const data = JSON.parse(rawText);
            if (response.ok) {
                status.value = data.message;
                // Redirect ke /admin setelah login sukses
                window.location.href = '/admin';
                return;
            } else {
                if (data.errors) {
                    errors.value = data.errors;
                } else {
                    errors.value = { email: [data.message || 'Login failed'] };
                }
            }
        } catch (e) {
            console.error('Login response is not JSON:', rawText);
            errors.value = { email: ['Server error: response is not JSON'] };
        }
    } catch (error) {
        console.error('Login error:', error);
        errors.value = { email: ['An error occurred during login'] };
    } finally {
        processing.value = false;
    }
};
</script>

<template>
    <GuestLayout>
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="errors.email ? errors.email[0] : ''" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="errors.password ? errors.password[0] : ''" />
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <a
                    href="/forgot-password"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Forgot your password?
                </a>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': processing }"
                    :disabled="processing"
                >
                    Log in
                </PrimaryButton>
            </div>

            <div class="mt-4 text-center">
                <a href="/register" class="text-sm text-gray-600 hover:text-gray-900">
                    Don't have an account? Register here
                </a>
            </div>
        </form>
    </GuestLayout>
</template>
