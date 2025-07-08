<template>
    <GuestLayout>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <router-link to="/">
                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                </router-link>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
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
                        <InputError class="mt-2" :message="errors.email" />
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
                        <InputError class="mt-2" :message="errors.password" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <router-link
                            v-if="canResetPassword"
                            to="/forgot-password"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Forgot your password?
                        </router-link>

                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Log in
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import { ref, reactive } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import Checkbox from '@/Components/Checkbox.vue'

export default {
    name: 'Login',
    components: {
        GuestLayout,
        ApplicationLogo,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Checkbox
    },
    setup() {
        const router = useRouter()
        const errors = ref({})
        const canResetPassword = ref(true)

        const form = reactive({
            email: '',
            password: '',
            remember: false,
            processing: false
        })

        const submit = async () => {
            form.processing = true
            errors.value = {}

            try {
                const response = await axios.post('/api/login', {
                    email: form.email,
                    password: form.password,
                    remember: form.remember
                })

                // Store the token
                localStorage.setItem('auth_token', response.data.token)
                localStorage.setItem('user', JSON.stringify(response.data.user))

                // Set axios default header
                axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`

                // Redirect to dashboard
                router.push('/dashboard')
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    errors.value = error.response.data.errors
                } else {
                    errors.value = { email: ['These credentials do not match our records.'] }
                }
            } finally {
                form.processing = false
            }
        }

        return {
            form,
            errors,
            canResetPassword,
            submit
        }
    }
}
</script>
