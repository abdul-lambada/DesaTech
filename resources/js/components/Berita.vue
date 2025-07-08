<template>
    <div>
        <!-- Hero Section -->
        <transition name="fade-slide">
        <section class="bg-gradient-to-r from-orange-600 to-red-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Berita & Informasi</h1>
                <p class="text-xl opacity-90">Informasi terkini seputar desa dan kegiatan masyarakat</p>
            </div>
        </section>
        </transition>

        <!-- Loader -->
        <div v-if="loading" class="loader-overlay">
            <div class="loader-container">
                <div class="loader"></div>
                <div class="loader-text">Memuat profil desa...</div>
            </div>
        </div>

        <!-- News Categories -->
        <section class="py-8 bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap gap-4 justify-center">
                    <transition-group name="fade-slide" tag="div">
                    <button v-for="category in newsCategories" :key="category.name"
                            @click="selectedCategory = category.name"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200"
                            :class="selectedCategory === category.name 
                                ? 'bg-orange-600 text-white' 
                                : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">
                        {{ category.name }}
                    </button>
                    </transition-group>
                </div>
            </div>
        </section>

        <!-- News Grid -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="section-title">Berita Desa</h2>
                    <div class="flex items-center space-x-4">
                        <select v-model="sortBy" class="px-3 py-2 border border-gray-300 rounded-md text-sm">
                            <option value="latest">Terbaru</option>
                            <option value="popular">Terpopuler</option>
                            <option value="title">Judul A-Z</option>
                        </select>
                    </div>
                </div>
                <transition-group name="fade-slide" tag="div" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article v-for="(news, index) in filteredNews" :key="news.id" 
                             class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
                             :style="{ transitionDelay: (index * 100) + 'ms' }"
                             data-aos="fade-up">
                        <img :src="news.image" :alt="news.title" 
                             class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <span>{{ news.date }}</span>
                                <span class="mx-2">•</span>
                                <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs">
                                    {{ news.category }}
                                </span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 line-clamp-2">{{ news.title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ news.excerpt }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        {{ news.views }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        {{ news.comments }}
                                    </span>
                                </div>
                                <button @click="readMore(news)" 
                                        class="text-orange-600 hover:text-orange-700 font-medium">
                                    Baca Selengkapnya →
                                </button>
                            </div>
                        </div>
                    </article>
                </transition-group>
                
                <!-- Load More Button -->
                <div class="text-center mt-12">
                    <button class="btn-primary bg-orange-600 hover:bg-orange-700">
                        Muat Lebih Banyak
                    </button>
                </div>
            </div>
        </section>

        <!-- Activity Agenda -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Agenda Kegiatan</h2>
                    <p class="text-gray-600">Jadwal kegiatan dan acara desa</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Upcoming Events -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6">Kegiatan Mendatang</h3>
                        <div class="space-y-4">
                            <div v-for="event in upcomingEvents" :key="event.id" 
                                 class="flex items-start space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex-shrink-0 w-16 h-16 bg-orange-100 rounded-lg flex flex-col items-center justify-center">
                                    <span class="text-lg font-bold text-orange-600">{{ event.day }}</span>
                                    <span class="text-xs text-orange-600">{{ event.month }}</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold mb-1">{{ event.title }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ event.description }}</p>
                                    <div class="flex items-center text-xs text-gray-500 space-x-4">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ event.time }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ event.location }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calendar -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Kalender Kegiatan</h3>
                        <div class="grid grid-cols-7 gap-1 mb-4">
                            <div v-for="day in ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab']" 
                                 :key="day" class="text-center text-sm font-medium text-gray-500 py-2">
                                {{ day }}
                            </div>
                        </div>
                        <div class="grid grid-cols-7 gap-1">
                            <div v-for="date in calendarDates" :key="date.day" 
                                 class="text-center py-2 text-sm border border-gray-200"
                                 :class="date.hasEvent ? 'bg-orange-100 text-orange-800 font-medium' : 'text-gray-700'">
                                {{ date.day }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Photo Gallery -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Galeri Foto & Video</h2>
                    <p class="text-gray-600">Dokumentasi kegiatan dan momen penting desa</p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div v-for="media in galleryItems" :key="media.id" 
                         class="relative group cursor-pointer overflow-hidden rounded-lg"
                         @click="openGalleryModal(media)">
                        <img :src="media.thumbnail" :alt="media.title" 
                             class="w-full h-32 object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                            <div v-if="media.type === 'video'" class="w-12 h-12 bg-white bg-opacity-80 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                            <h4 class="text-white text-sm font-medium">{{ media.title }}</h4>
                            <p class="text-white/80 text-xs">{{ media.date }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-8">
                    <button class="btn-primary bg-orange-600 hover:bg-orange-700">
                        Lihat Semua Galeri
                    </button>
                </div>
            </div>
        </section>

        <!-- Announcements -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Pengumuman</h2>
                    <p class="text-gray-600">Informasi penting dan pengumuman resmi desa</p>
                </div>
                
                <div class="space-y-6">
                    <div v-for="announcement in announcements" :key="announcement.id" 
                         class="card hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-3">
                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium">
                                        {{ announcement.priority }}
                                    </span>
                                    <span class="text-sm text-gray-500">{{ announcement.date }}</span>
                                </div>
                                <h3 class="text-xl font-semibold mb-2">{{ announcement.title }}</h3>
                                <p class="text-gray-600 mb-4">{{ announcement.content }}</p>
                                <div v-if="announcement.attachments" class="flex items-center space-x-4">
                                    <span class="text-sm text-gray-500">Lampiran:</span>
                                    <div class="flex space-x-2">
                                        <a v-for="attachment in announcement.attachments" :key="attachment.name"
                                           href="#" class="flex items-center space-x-1 text-blue-600 hover:text-blue-700 text-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <span>{{ attachment.name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ml-4">
                                <button @click="toggleAnnouncement(announcement.id)" 
                                        class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Modal -->
        <div v-if="showGalleryModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4">
            <div class="relative max-w-4xl w-full">
                <button @click="closeGalleryModal" 
                        class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <div v-if="selectedMedia" class="bg-white rounded-lg overflow-hidden">
                    <img v-if="selectedMedia.type === 'image'" :src="selectedMedia.url" :alt="selectedMedia.title" 
                         class="w-full h-auto">
                    <video v-else-if="selectedMedia.type === 'video'" :src="selectedMedia.url" controls 
                           class="w-full h-auto"></video>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ selectedMedia.title }}</h3>
                        <p class="text-gray-600">{{ selectedMedia.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Berita',
    data() {
        return {
            selectedCategory: 'Semua',
            sortBy: 'latest',
            showGalleryModal: false,
            selectedMedia: null,
            newsCategories: [
                { name: 'Semua' },
                { name: 'Pemerintahan' },
                { name: 'Pembangunan' },
                { name: 'Ekonomi' },
                { name: 'Sosial' },
                { name: 'Kesehatan' },
                { name: 'Pendidikan' }
            ],
            news: [
                {
                    id: 1,
                    title: 'Pembangunan Jalan Desa Selesai, Akses Transportasi Semakin Lancar',
                    excerpt: 'Pembangunan jalan desa sepanjang 2 kilometer telah selesai dan siap digunakan warga. Jalan ini menghubungkan beberapa dusun dan memudahkan akses transportasi.',
                    image: 'https://images.unsplash.com/photo-1545459720-aac8509eb02c?w=400&h=300&fit=crop',
                    category: 'Pembangunan',
                    date: '15 Des 2024',
                    views: 245,
                    comments: 12
                },
                {
                    id: 2,
                    title: 'Pelatihan UMKM Digital Sukses, 50 Warga Ikut Berpartisipasi',
                    excerpt: 'Program pelatihan UMKM digital untuk meningkatkan kompetensi warga dalam memasarkan produk secara online berhasil dilaksanakan.',
                    image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=300&fit=crop',
                    category: 'Ekonomi',
                    date: '12 Des 2024',
                    views: 189,
                    comments: 8
                },
                {
                    id: 3,
                    title: 'Vaksinasi COVID-19 Tahap 3 Akan Dilaksanakan Minggu Depan',
                    excerpt: 'Program vaksinasi COVID-19 tahap ketiga akan dilaksanakan minggu depan di Balai Desa. Semua warga diimbau untuk hadir sesuai jadwal.',
                    image: 'https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?w=400&h=300&fit=crop',
                    category: 'Kesehatan',
                    date: '10 Des 2024',
                    views: 312,
                    comments: 15
                },
                {
                    id: 4,
                    title: 'Posyandu Lansia Dibuka, Layanan Kesehatan Gratis untuk Warga Tua',
                    excerpt: 'Posyandu khusus lansia telah dibuka di Balai Desa. Layanan kesehatan gratis tersedia setiap minggu untuk warga berusia 60 tahun ke atas.',
                    image: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=400&h=300&fit=crop',
                    category: 'Kesehatan',
                    date: '8 Des 2024',
                    views: 156,
                    comments: 6
                },
                {
                    id: 5,
                    title: 'Program Beasiswa Desa untuk Mahasiswa Berprestasi',
                    excerpt: 'Pemerintah desa memberikan beasiswa kepada 10 mahasiswa berprestasi dari keluarga kurang mampu. Program ini akan berlanjut setiap tahun.',
                    image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9e1?w=400&h=300&fit=crop',
                    category: 'Pendidikan',
                    date: '5 Des 2024',
                    views: 278,
                    comments: 20
                },
                {
                    id: 6,
                    title: 'Gotong Royong Bersih Desa, Warga Bersatu Membersihkan Lingkungan',
                    excerpt: 'Kegiatan gotong royong bersih desa berhasil dilaksanakan dengan partisipasi tinggi dari warga. Lingkungan desa menjadi lebih bersih dan sehat.',
                    image: 'https://images.unsplash.com/photo-1569336415962-a4bd9f69cd83?w=400&h=300&fit=crop',
                    category: 'Sosial',
                    date: '3 Des 2024',
                    views: 203,
                    comments: 11
                }
            ],
            upcomingEvents: [
                {
                    id: 1,
                    title: 'Rapat Koordinasi Pemerintahan Desa',
                    description: 'Rapat koordinasi bulanan untuk membahas program dan kegiatan desa',
                    day: '20',
                    month: 'Des',
                    time: '09:00 WIB',
                    location: 'Balai Desa'
                },
                {
                    id: 2,
                    title: 'Posyandu Balita dan Imunisasi',
                    description: 'Pemeriksaan kesehatan balita dan program imunisasi rutin',
                    day: '22',
                    month: 'Des',
                    time: '08:00 WIB',
                    location: 'Posyandu Desa'
                },
                {
                    id: 3,
                    title: 'Pelatihan Pertanian Organik',
                    description: 'Pelatihan teknik pertanian organik untuk kelompok tani',
                    day: '25',
                    month: 'Des',
                    time: '14:00 WIB',
                    location: 'Lapangan Desa'
                },
                {
                    id: 4,
                    title: 'Kegiatan Senam Lansia',
                    description: 'Senam pagi untuk warga lansia untuk menjaga kesehatan',
                    day: '27',
                    month: 'Des',
                    time: '06:00 WIB',
                    location: 'Halaman Balai Desa'
                }
            ],
            calendarDates: [
                { day: 1, hasEvent: false }, { day: 2, hasEvent: false }, { day: 3, hasEvent: true },
                { day: 4, hasEvent: false }, { day: 5, hasEvent: true }, { day: 6, hasEvent: false },
                { day: 7, hasEvent: false }, { day: 8, hasEvent: true }, { day: 9, hasEvent: false },
                { day: 10, hasEvent: true }, { day: 11, hasEvent: false }, { day: 12, hasEvent: true },
                { day: 13, hasEvent: false }, { day: 14, hasEvent: false }, { day: 15, hasEvent: true },
                { day: 16, hasEvent: false }, { day: 17, hasEvent: false }, { day: 18, hasEvent: false },
                { day: 19, hasEvent: false }, { day: 20, hasEvent: true }, { day: 21, hasEvent: false },
                { day: 22, hasEvent: true }, { day: 23, hasEvent: false }, { day: 24, hasEvent: false },
                { day: 25, hasEvent: true }, { day: 26, hasEvent: false }, { day: 27, hasEvent: true },
                { day: 28, hasEvent: false }, { day: 29, hasEvent: false }, { day: 30, hasEvent: false },
                { day: 31, hasEvent: false }
            ],
            galleryItems: [
                {
                    id: 1,
                    title: 'Pembangunan Jalan',
                    type: 'image',
                    thumbnail: 'https://images.unsplash.com/photo-1545459720-aac8509eb02c?w=300&h=200&fit=crop',
                    url: 'https://images.unsplash.com/photo-1545459720-aac8509eb02c?w=800&h=600&fit=crop',
                    date: '15 Des 2024'
                },
                {
                    id: 2,
                    title: 'Pelatihan UMKM',
                    type: 'video',
                    thumbnail: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=300&h=200&fit=crop',
                    url: '/videos/pelatihan-umkm.mp4',
                    date: '12 Des 2024'
                },
                {
                    id: 3,
                    title: 'Vaksinasi COVID-19',
                    type: 'image',
                    thumbnail: 'https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?w=300&h=200&fit=crop',
                    url: 'https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?w=800&h=600&fit=crop',
                    date: '10 Des 2024'
                },
                {
                    id: 4,
                    title: 'Posyandu Lansia',
                    type: 'image',
                    thumbnail: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=300&h=200&fit=crop',
                    url: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=800&h=600&fit=crop',
                    date: '8 Des 2024'
                },
                {
                    id: 5,
                    title: 'Gotong Royong',
                    type: 'image',
                    thumbnail: 'https://images.unsplash.com/photo-1569336415962-a4bd9f69cd83?w=300&h=200&fit=crop',
                    url: 'https://images.unsplash.com/photo-1569336415962-a4bd9f69cd83?w=800&h=600&fit=crop',
                    date: '3 Des 2024'
                },
                {
                    id: 6,
                    title: 'Rapat Desa',
                    type: 'image',
                    thumbnail: 'https://images.unsplash.com/photo-1523050854058-8df90110c9e1?w=300&h=200&fit=crop',
                    url: 'https://images.unsplash.com/photo-1523050854058-8df90110c9e1?w=800&h=600&fit=crop',
                    date: '1 Des 2024'
                },
                {
                    id: 7,
                    title: 'Senam Lansia',
                    type: 'video',
                    thumbnail: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=300&h=200&fit=crop',
                    url: '/videos/senam-lansia.mp4',
                    date: '28 Nov 2024'
                },
                {
                    id: 8,
                    title: 'Panen Raya',
                    type: 'image',
                    thumbnail: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=300&h=200&fit=crop',
                    url: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&h=600&fit=crop',
                    date: '25 Nov 2024'
                }
            ],
            announcements: [
                {
                    id: 1,
                    title: 'Pengumuman Libur Hari Raya Natal dan Tahun Baru',
                    content: 'Diumumkan kepada seluruh warga desa bahwa kantor desa akan libur pada tanggal 25 Desember 2024 dan 1 Januari 2025. Pelayanan akan kembali normal pada tanggal 2 Januari 2025.',
                    priority: 'Penting',
                    date: '20 Desember 2024',
                    attachments: [
                        { name: 'Surat Pengumuman.pdf' }
                    ]
                },
                {
                    id: 2,
                    title: 'Jadwal Pelayanan KTP dan KK Bulan Januari 2025',
                    content: 'Pelayanan pembuatan KTP dan KK akan dilaksanakan pada tanggal 6-10 Januari 2025. Warga yang membutuhkan layanan ini diharapkan menyiapkan dokumen yang diperlukan.',
                    priority: 'Informasi',
                    date: '18 Desember 2024',
                    attachments: [
                        { name: 'Jadwal Pelayanan.pdf' },
                        { name: 'Syarat Dokumen.pdf' }
                    ]
                },
                {
                    id: 3,
                    title: 'Pendaftaran Program Bantuan UMKM 2025',
                    content: 'Pendaftaran program bantuan UMKM untuk tahun 2025 telah dibuka. Warga yang berminat dapat mendaftar di kantor desa dengan membawa dokumen yang diperlukan.',
                    priority: 'Penting',
                    date: '15 Desember 2024',
                    attachments: [
                        { name: 'Form Pendaftaran.pdf' },
                        { name: 'Panduan UMKM.pdf' }
                    ]
                }
            ]
        }
    },
    computed: {
        filteredNews() {
            let filtered = this.news;
            
            if (this.selectedCategory !== 'Semua') {
                filtered = filtered.filter(news => news.category === this.selectedCategory);
            }
            
            // Sort logic would go here based on sortBy
            return filtered;
        }
    },
    methods: {
        readMore(news) {
            // Navigate to news detail page
            this.$router.push(`/berita/${news.id}`);
        },
        openGalleryModal(media) {
            this.selectedMedia = media;
            this.showGalleryModal = true;
        },
        closeGalleryModal() {
            this.showGalleryModal = false;
            this.selectedMedia = null;
        },
        toggleAnnouncement(id) {
            // Toggle announcement expansion
            console.log('Toggle announcement:', id);
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