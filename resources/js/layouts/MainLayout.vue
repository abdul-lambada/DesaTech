<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-50">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <router-link to="/" class="flex items-center space-x-2">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-lg">D</span>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-gray-900">DesaTech</h1>
                                <p class="text-xs text-gray-500">Digital Village</p>
                            </div>
                        </router-link>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <router-link 
                            v-for="item in navigationItems" 
                            :key="item.path"
                            :to="item.path"
                            class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 transform hover:scale-105 hover:shadow-md"
                            :class="{ 'text-blue-600 bg-blue-50': $route.path === item.path }"
                        >
                            {{ item.name }}
                        </router-link>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button 
                            @click="toggleMobileMenu"
                            class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                        >
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <transition name="slide-fade">
                  <div v-if="mobileMenuOpen" class="md:hidden">
                      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200">
                          <router-link 
                              v-for="item in navigationItems" 
                              :key="item.path"
                              :to="item.path"
                              @click="mobileMenuOpen = false"
                              class="text-gray-700 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
                              :class="{ 'text-blue-600 bg-blue-50': $route.path === item.path }"
                          >
                              {{ item.name }}
                          </router-link>
                      </div>
                  </div>
                </transition>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <transition name="fade-page" mode="out-in">
                <router-view />
            </transition>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Logo and Description -->
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold">D</span>
                            </div>
                            <h3 class="text-lg font-bold">DesaTech</h3>
                        </div>
                        <p class="text-gray-300 mb-4">
                            Platform digital desa yang memudahkan akses informasi dan layanan publik untuk warga desa.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Layanan Cepat</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-200">Surat Keterangan</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-200">Pengajuan Proposal</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-200">Data Penduduk</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-200">Berita Desa</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                        <div class="space-y-2 text-gray-300">
                            <p>Jl. Desa No. 123</p>
                            <p>Kecamatan, Kabupaten</p>
                            <p>Email: info@desatech.id</p>
                            <p>Telp: (021) 1234-5678</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 DesaTech. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'MainLayout',
    data() {
        return {
            mobileMenuOpen: false,
            navigationItems: [
                { name: 'Beranda', path: '/' },
                { name: 'Profil Desa', path: '/profil-desa' },
                { name: 'Layanan', path: '/layanan' },
                { name: 'Data Desa', path: '/data-desa' },
                { name: 'Berita', path: '/berita' },
                { name: 'Transparansi', path: '/transparansi' },
                { name: 'Kontak', path: '/kontak' }
            ]
        }
    },
    methods: {
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        }
    }
}
</script> 

<style scoped>
.fade-page-enter-active, .fade-page-leave-active {
  transition: opacity 0.5s;
}
.fade-page-enter-from, .fade-page-leave-to {
  opacity: 0;
}
.fade-page-enter-to, .fade-page-leave-from {
  opacity: 1;
}
.slide-fade-enter-active {
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.slide-fade-leave-active {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.slide-fade-enter-from {
  opacity: 0;
  transform: translateY(-20px);
}
.slide-fade-enter-to {
  opacity: 1;
  transform: translateY(0);
}
.slide-fade-leave-from {
  opacity: 1;
  transform: translateY(0);
}
.slide-fade-leave-to {
  opacity: 0;
  transform: translateY(-20px);
}
</style> 