<template>
    <div>
        <!-- Hero Section -->
        <transition name="fade-slide">
        <section class="relative bg-gradient-to-r from-blue-600 to-green-600 text-white">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        Selamat Datang di
                        <span class="text-yellow-300">DesaTech</span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                        Platform digital desa yang memudahkan akses informasi dan layanan publik untuk warga desa
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <router-link to="/layanan" class="btn-primary bg-white text-blue-600 hover:bg-gray-100">
                            Layanan Desa
                        </router-link>
                        <router-link to="/berita" class="btn-secondary bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600">
                            Berita Terbaru
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
        </transition>

        <!-- Quick Stats -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <transition-group name="fade-slide" tag="div" class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div v-for="(stat, index) in quickStats" :key="stat.label" class="text-center" :style="{ transitionDelay: (index * 100) + 'ms' }" data-aos="fade-up">
                        <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">{{ stat.value }}</div>
                        <div class="text-gray-600">{{ stat.label }}</div>
                    </div>
                </transition-group>
            </div>
        </section>

        <!-- Village Info -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Tentang Desa Kami</h2>
                    <p class="text-gray-600 max-w-3xl mx-auto">
                        Desa kami adalah desa yang maju dengan teknologi digital untuk memberikan pelayanan terbaik kepada warga.
                    </p>
                </div>
                <transition-group name="fade-slide" tag="div" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div v-for="(info, index) in villageInfo" :key="info.title" class="card text-center" :style="{ transitionDelay: (index * 100) + 'ms' }" data-aos="fade-up">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <component :is="info.icon" class="w-8 h-8 text-blue-600" />
                        </div>
                        <h3 class="text-xl font-semibold mb-3">{{ info.title }}</h3>
                        <p class="text-gray-600">{{ info.description }}</p>
                    </div>
                </transition-group>
            </div>
        </section>

        <!-- News Slider -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="section-title">Berita Terbaru</h2>
                    <router-link to="/berita" class="text-blue-600 hover:text-blue-700 font-medium">
                        Lihat Semua →
                    </router-link>
                </div>
                <transition-group name="fade-slide" tag="div" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="(news, index) in latestNews" :key="news.id" class="card hover:shadow-lg transition-shadow duration-300" :style="{ transitionDelay: (index * 100) + 'ms' }" data-aos="fade-up">
                        <img :src="news.image" :alt="news.title" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span>{{ news.date }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ news.category }}</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2 line-clamp-2">{{ news.title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ news.excerpt }}</p>
                        <router-link :to="`/berita/${news.id}`" class="text-blue-600 hover:text-blue-700 font-medium">
                            Baca Selengkapnya →
                        </router-link>
                    </div>
                </transition-group>
            </div>
        </section>

        <!-- Population Statistics -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Statistik Penduduk</h2>
                    <p class="text-gray-600">Data demografis terkini desa kami</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Gender Distribution -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Distribusi Gender</h3>
                        <div class="space-y-4">
                            <div v-for="gender in genderStats" :key="gender.type" class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 rounded-full mr-3" :class="gender.color"></div>
                                    <span class="font-medium">{{ gender.type }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-32 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full" :class="gender.color" :style="{ width: gender.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-12">{{ gender.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Age Distribution -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Distribusi Usia</h3>
                        <div class="space-y-4">
                            <div v-for="age in ageStats" :key="age.range" class="flex items-center justify-between">
                                <span class="font-medium">{{ age.range }}</span>
                                <div class="flex items-center space-x-2">
                                    <div class="w-32 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full bg-blue-600" :style="{ width: age.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-12">{{ age.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Services -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Layanan Cepat</h2>
                    <p class="text-gray-600">Akses layanan desa dengan mudah</p>
                </div>
                <transition-group name="fade-slide" tag="div" class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div v-for="(service, index) in quickServices" :key="service.name" 
                         class="card text-center hover:shadow-lg transition-all duration-300 hover:-translate-y-1 cursor-pointer" :style="{ transitionDelay: (index * 100) + 'ms' }" data-aos="fade-up">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <component :is="service.icon" class="w-6 h-6 text-blue-600" />
                        </div>
                        <h3 class="font-semibold mb-2">{{ service.name }}</h3>
                        <p class="text-sm text-gray-600">{{ service.description }}</p>
                    </div>
                </transition-group>
            </div>
        </section>

        <!-- Contact Quick -->
        <section class="py-16 bg-blue-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold mb-4">Butuh Bantuan?</h2>
                <p class="text-xl mb-8 opacity-90">Hubungi kami untuk informasi lebih lanjut</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+6281234567890" class="btn-primary bg-white text-blue-600 hover:bg-gray-100">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Hubungi Kami
                    </a>
                    <router-link to="/kontak" class="btn-secondary bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600">
                        Kirim Pesan
                    </router-link>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'Home',
    data() {
        return {
            quickStats: [
                { label: 'Total Penduduk', value: '2,847' },
                { label: 'Keluarga', value: '756' },
                { label: 'Luas Wilayah', value: '12.5 km²' },
                { label: 'RT/RW', value: '24/6' }
            ],
            villageInfo: [
                {
                    title: 'Visi',
                    description: 'Desa yang maju, mandiri, dan sejahtera dengan teknologi digital',
                    icon: 'EyeIcon'
                },
                {
                    title: 'Misi',
                    description: 'Meningkatkan kualitas pelayanan publik melalui digitalisasi',
                    icon: 'TargetIcon'
                },
                {
                    title: 'Nilai',
                    description: 'Transparansi, akuntabilitas, dan pelayanan prima',
                    icon: 'HeartIcon'
                }
            ],
            latestNews: [
                {
                    id: 1,
                    title: 'Pembangunan Jalan Desa Selesai',
                    excerpt: 'Pembangunan jalan desa sepanjang 2 kilometer telah selesai dan siap digunakan warga.',
                    image: 'https://images.unsplash.com/photo-1545459720-aac8509eb02c?w=400&h=300&fit=crop',
                    date: '15 Des 2024',
                    category: 'Infrastruktur'
                },
                {
                    id: 2,
                    title: 'Pelatihan UMKM Digital',
                    excerpt: 'Program pelatihan UMKM digital untuk meningkatkan ekonomi warga desa.',
                    image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=300&fit=crop',
                    date: '12 Des 2024',
                    category: 'Ekonomi'
                },
                {
                    id: 3,
                    title: 'Vaksinasi COVID-19 Tahap 3',
                    excerpt: 'Program vaksinasi COVID-19 tahap ketiga akan dilaksanakan minggu depan.',
                    image: 'https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?w=400&h=300&fit=crop',
                    date: '10 Des 2024',
                    category: 'Kesehatan'
                }
            ],
            genderStats: [
                { type: 'Laki-laki', percentage: 52, color: 'bg-blue-500' },
                { type: 'Perempuan', percentage: 48, color: 'bg-pink-500' }
            ],
            ageStats: [
                { range: '0-17 tahun', percentage: 25 },
                { range: '18-30 tahun', percentage: 30 },
                { range: '31-50 tahun', percentage: 28 },
                { range: '51+ tahun', percentage: 17 }
            ],
            quickServices: [
                {
                    name: 'Surat Keterangan',
                    description: 'Pengajuan surat keterangan domisili, usaha, dll',
                    icon: 'DocumentIcon'
                },
                {
                    name: 'KTP & KK',
                    description: 'Layanan administrasi kependudukan',
                    icon: 'IdentificationIcon'
                },
                {
                    name: 'Proposal',
                    description: 'Pengajuan proposal bantuan dan aspirasi',
                    icon: 'ClipboardIcon'
                },
                {
                    name: 'Data Desa',
                    description: 'Informasi statistik dan data desa',
                    icon: 'ChartBarIcon'
                }
            ]
        }
    }
}
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.fade-slide-enter-active, .fade-slide-leave-active {
  transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}
.fade-slide-enter-from, .fade-slide-leave-to {
  opacity: 0;
  transform: translateY(40px);
}
.fade-slide-enter-to, .fade-slide-leave-from {
  opacity: 1;
  transform: translateY(0);
}
</style> 