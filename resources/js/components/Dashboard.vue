<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        You're logged in! Welcome, {{ user.name }}!
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

export default {
    name: 'Dashboard',
    components: {
        AuthenticatedLayout
    },
    setup() {
        const router = useRouter()
        const user = ref({})

        onMounted(() => {
            const userData = localStorage.getItem('user')
            if (userData) {
                user.value = JSON.parse(userData)
            }
        })

        return {
            user
        }
    }
}
</script>
