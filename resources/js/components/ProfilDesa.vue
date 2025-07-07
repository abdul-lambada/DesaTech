<template>
    <div>
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-600 to-green-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Profil Desa</h1>
                <p class="text-xl opacity-90">Mengenal lebih dekat desa kami</p>
            </div>
        </section>

        <!-- Village Overview -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="section-title">Desa Maju Bersama</h2>
                        <p class="text-gray-600 mb-6">
                            Desa kami adalah desa yang terletak di kecamatan yang subur dan strategis. 
                            Dengan luas wilayah 12.5 km², desa ini dihuni oleh 2,847 jiwa yang tersebar 
                            dalam 756 kepala keluarga.
                        </p>
                        <div class="grid grid-cols-2 gap-6">
                            <div v-for="stat in villageStats" :key="stat.label" class="text-center p-4 bg-gray-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600 mb-1">{{ stat.value }}</div>
                                <div class="text-sm text-gray-600">{{ stat.label }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1545459720-aac8509eb02c?w=600&h=400&fit=crop" 
                             alt="Desa" class="rounded-lg shadow-lg">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-lg"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- History -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Sejarah Desa</h2>
                    <p class="text-gray-600">Perjalanan panjang desa kami dari masa ke masa</p>
                </div>
                
                <div class="relative">
                    <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-blue-200"></div>
                    <div class="space-y-8">
                        <div v-for="(event, index) in historyEvents" :key="index" 
                             class="relative flex items-start space-x-8">
                            <div class="flex-shrink-0 w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                {{ event.year }}
                            </div>
                            <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
                                <h3 class="text-xl font-semibold mb-2">{{ event.title }}</h3>
                                <p class="text-gray-600">{{ event.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Visi & Misi</h2>
                    <p class="text-gray-600">Arah dan tujuan pembangunan desa</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Vision -->
                    <div class="card text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Visi</h3>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            "Terwujudnya Desa yang Maju, Mandiri, dan Sejahtera dengan 
                            Pemanfaatan Teknologi Digital untuk Meningkatkan Kualitas 
                            Hidup Masyarakat"
                        </p>
                    </div>

                    <!-- Mission -->
                    <div class="card">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-center">Misi</h3>
                        <ul class="space-y-4">
                            <li v-for="(mission, index) in missions" :key="index" 
                                class="flex items-start space-x-3">
                                <span class="flex-shrink-0 w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-sm font-bold">
                                    {{ index + 1 }}
                                </span>
                                <span class="text-gray-700">{{ mission }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Government Structure -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Struktur Pemerintahan</h2>
                    <p class="text-gray-600">Organisasi dan kepengurusan desa</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="position in governmentStructure" :key="position.title" 
                         class="card text-center hover:shadow-lg transition-shadow duration-300">
                        <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ position.title }}</h3>
                        <p class="text-blue-600 font-medium mb-2">{{ position.name }}</p>
                        <p class="text-sm text-gray-600">{{ position.period }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Administrative Areas -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Wilayah Administratif</h2>
                    <p class="text-gray-600">Pembagian wilayah desa berdasarkan RT/RW</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="area in administrativeAreas" :key="area.rw" 
                         class="card hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-lg font-semibold mb-4 text-blue-600">RW {{ area.rw }}</h3>
                        <div class="space-y-3">
                            <div v-for="rt in area.rts" :key="rt.number" 
                                 class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium">RT {{ rt.number }}</span>
                                <span class="text-sm text-gray-600">{{ rt.head }} KK</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Total KK:</span>
                                <span class="font-semibold">{{ area.totalKK }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Geographical Data -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Data Geografis</h2>
                    <p class="text-gray-600">Informasi geografis dan topografi desa</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Map/Image -->
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1569336415962-a4bd9f69cd83?w=600&h=400&fit=crop" 
                             alt="Peta Desa" class="rounded-lg shadow-lg w-full">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-lg"></div>
                    </div>

                    <!-- Data -->
                    <div class="space-y-6">
                        <div v-for="data in geographicalData" :key="data.label" 
                             class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <component :is="data.icon" class="w-5 h-5 text-blue-600" />
                                </div>
                                <span class="font-medium">{{ data.label }}</span>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">{{ data.value }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'ProfilDesa',
    data() {
        return {
            villageStats: [
                { label: 'Luas Wilayah', value: '12.5 km²' },
                { label: 'Jumlah Penduduk', value: '2,847' },
                { label: 'Kepala Keluarga', value: '756' },
                { label: 'RT/RW', value: '24/6' }
            ],
            historyEvents: [
                {
                    year: '1980',
                    title: 'Pembentukan Desa',
                    description: 'Desa ini dibentuk berdasarkan Peraturan Daerah setempat dengan nama awal Desa Maju.'
                },
                {
                    year: '1995',
                    title: 'Pembangunan Infrastruktur',
                    description: 'Dimulainya pembangunan infrastruktur dasar seperti jalan desa dan fasilitas umum.'
                },
                {
                    year: '2010',
                    title: 'Program Pemberdayaan',
                    description: 'Peluncuran berbagai program pemberdayaan masyarakat dan pengembangan ekonomi desa.'
                },
                {
                    year: '2020',
                    title: 'Digitalisasi Desa',
                    description: 'Implementasi teknologi digital untuk meningkatkan pelayanan publik dan transparansi.'
                }
            ],
            missions: [
                'Meningkatkan kualitas pelayanan publik melalui digitalisasi',
                'Mengembangkan ekonomi desa berbasis teknologi',
                'Membangun infrastruktur yang berkelanjutan',
                'Meningkatkan kualitas pendidikan dan kesehatan masyarakat',
                'Mengembangkan potensi sumber daya alam secara optimal'
            ],
            governmentStructure: [
                {
                    title: 'Kepala Desa',
                    name: 'Ahmad Supriyadi',
                    period: '2021-2027'
                },
                {
                    title: 'Sekretaris Desa',
                    name: 'Siti Nurhaliza',
                    period: '2021-2027'
                },
                {
                    title: 'Kasi Pemerintahan',
                    name: 'Budi Santoso',
                    period: '2021-2027'
                },
                {
                    title: 'Kasi Kesejahteraan',
                    name: 'Dewi Sartika',
                    period: '2021-2027'
                },
                {
                    title: 'Kasi Pelayanan',
                    name: 'Rudi Hartono',
                    period: '2021-2027'
                },
                {
                    title: 'Kaur Keuangan',
                    name: 'Maya Indah',
                    period: '2021-2027'
                }
            ],
            administrativeAreas: [
                {
                    rw: '01',
                    rts: [
                        { number: '001', head: 45 },
                        { number: '002', head: 52 },
                        { number: '003', head: 38 },
                        { number: '004', head: 41 }
                    ],
                    totalKK: 176
                },
                {
                    rw: '02',
                    rts: [
                        { number: '005', head: 48 },
                        { number: '006', head: 55 },
                        { number: '007', head: 42 },
                        { number: '008', head: 39 }
                    ],
                    totalKK: 184
                },
                {
                    rw: '03',
                    rts: [
                        { number: '009', head: 51 },
                        { number: '010', head: 47 },
                        { number: '011', head: 44 },
                        { number: '012', head: 53 }
                    ],
                    totalKK: 195
                },
                {
                    rw: '04',
                    rts: [
                        { number: '013', head: 46 },
                        { number: '014', head: 49 },
                        { number: '015', head: 43 },
                        { number: '016', head: 50 }
                    ],
                    totalKK: 188
                },
                {
                    rw: '05',
                    rts: [
                        { number: '017', head: 54 },
                        { number: '018', head: 40 },
                        { number: '019', head: 47 },
                        { number: '020', head: 45 }
                    ],
                    totalKK: 186
                },
                {
                    rw: '06',
                    rts: [
                        { number: '021', head: 42 },
                        { number: '022', head: 48 },
                        { number: '023', head: 51 },
                        { number: '024', head: 46 }
                    ],
                    totalKK: 187
                }
            ],
            geographicalData: [
                {
                    label: 'Luas Wilayah',
                    value: '12.5 km²',
                    icon: 'MapIcon'
                },
                {
                    label: 'Ketinggian',
                    value: '150-200 mdpl',
                    icon: 'MountainIcon'
                },
                {
                    label: 'Curah Hujan',
                    value: '2,500 mm/tahun',
                    icon: 'CloudRainIcon'
                },
                {
                    label: 'Suhu Rata-rata',
                    value: '26-30°C',
                    icon: 'SunIcon'
                },
                {
                    label: 'Batas Utara',
                    value: 'Desa Sebelah Utara',
                    icon: 'LocationMarkerIcon'
                },
                {
                    label: 'Batas Selatan',
                    value: 'Desa Sebelah Selatan',
                    icon: 'LocationMarkerIcon'
                }
            ]
        }
    }
}
</script> 