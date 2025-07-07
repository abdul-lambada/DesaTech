<template>
    <div>
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-purple-600 to-blue-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Data Desa</h1>
                <p class="text-xl opacity-90">Statistik dan data terkini desa kami</p>
            </div>
        </section>

        <!-- Overview Stats -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Statistik Umum</h2>
                    <p class="text-gray-600">Data demografis dan statistik dasar desa</p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div v-for="stat in overviewStats" :key="stat.label" 
                         class="text-center p-6 bg-gradient-to-br from-blue-50 to-purple-50 rounded-lg">
                        <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">{{ stat.value }}</div>
                        <div class="text-gray-600">{{ stat.label }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ stat.change }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Population Statistics -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Statistik Penduduk</h2>
                    <p class="text-gray-600">Data kependudukan berdasarkan berbagai kategori</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Gender Distribution -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Distribusi Gender</h3>
                        <div class="space-y-4">
                            <div v-for="gender in genderStats" :key="gender.type" 
                                 class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 rounded-full mr-3" :class="gender.color"></div>
                                    <span class="font-medium">{{ gender.type }}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="w-32 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full" :class="gender.color" 
                                             :style="{ width: gender.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-16">{{ gender.count }}</span>
                                    <span class="text-sm text-gray-500 w-12">{{ gender.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Age Distribution -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Distribusi Usia</h3>
                        <div class="space-y-4">
                            <div v-for="age in ageStats" :key="age.range" 
                                 class="flex items-center justify-between">
                                <span class="font-medium">{{ age.range }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-32 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full bg-purple-600" 
                                             :style="{ width: age.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-16">{{ age.count }}</span>
                                    <span class="text-sm text-gray-500 w-12">{{ age.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Family Statistics -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Statistik Keluarga</h2>
                    <p class="text-gray-600">Data keluarga dan rumah tangga</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Family Size -->
                    <div class="card">
                        <h3 class="text-lg font-semibold mb-6">Ukuran Keluarga</h3>
                        <div class="space-y-4">
                            <div v-for="size in familySizes" :key="size.members" 
                                 class="flex items-center justify-between">
                                <span class="font-medium">{{ size.members }} orang</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-24 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full bg-green-600" 
                                             :style="{ width: size.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ size.count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Family Type -->
                    <div class="card">
                        <h3 class="text-lg font-semibold mb-6">Jenis Keluarga</h3>
                        <div class="space-y-4">
                            <div v-for="type in familyTypes" :key="type.name" 
                                 class="flex items-center justify-between">
                                <span class="font-medium">{{ type.name }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-24 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full bg-blue-600" 
                                             :style="{ width: type.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ type.count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Housing -->
                    <div class="card">
                        <h3 class="text-lg font-semibold mb-6">Status Kepemilikan Rumah</h3>
                        <div class="space-y-4">
                            <div v-for="house in housingStats" :key="house.status" 
                                 class="flex items-center justify-between">
                                <span class="font-medium">{{ house.status }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-24 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full bg-orange-600" 
                                             :style="{ width: house.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ house.count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education & Employment -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Pendidikan & Pekerjaan</h2>
                    <p class="text-gray-600">Statistik tingkat pendidikan dan lapangan pekerjaan</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Education Level -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Tingkat Pendidikan</h3>
                        <div class="space-y-4">
                            <div v-for="edu in educationStats" :key="edu.level" 
                                 class="flex items-center justify-between">
                                <span class="font-medium">{{ edu.level }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-32 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full bg-indigo-600" 
                                             :style="{ width: edu.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-16">{{ edu.count }}</span>
                                    <span class="text-sm text-gray-500 w-12">{{ edu.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Employment -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Lapangan Pekerjaan</h3>
                        <div class="space-y-4">
                            <div v-for="job in employmentStats" :key="job.sector" 
                                 class="flex items-center justify-between">
                                <span class="font-medium">{{ job.sector }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-32 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full bg-teal-600" 
                                             :style="{ width: job.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-16">{{ job.count }}</span>
                                    <span class="text-sm text-gray-500 w-12">{{ job.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- IDM & SDGs -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">IDM & SDGs Desa</h2>
                    <p class="text-gray-600">Indeks Desa Membangun dan Sustainable Development Goals</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- IDM Score -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Indeks Desa Membangun (IDM)</h3>
                        <div class="text-center mb-6">
                            <div class="text-6xl font-bold text-blue-600 mb-2">{{ idmScore.score }}</div>
                            <div class="text-lg text-gray-600 mb-4">{{ idmScore.category }}</div>
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div class="h-4 rounded-full bg-gradient-to-r from-red-500 to-yellow-500 to-green-500" 
                                     :style="{ width: idmScore.percentage + '%' }"></div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div v-for="dimension in idmDimensions" :key="dimension.name" 
                                 class="flex items-center justify-between">
                                <span class="font-medium">{{ dimension.name }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-24 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full bg-blue-600" 
                                             :style="{ width: dimension.score + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ dimension.score }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SDGs Progress -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">SDGs Desa Progress</h3>
                        <div class="space-y-4">
                            <div v-for="sdg in sdgsProgress" :key="sdg.goal" 
                                 class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold"
                                         :class="getSDGColor(sdg.status)">
                                        {{ sdg.goal }}
                                    </div>
                                    <span class="font-medium">{{ sdg.title }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-20 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full" 
                                             :class="getSDGProgressColor(sdg.progress)"
                                             :style="{ width: sdg.progress + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ sdg.progress }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Data Download -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="section-title">Unduh Data</h2>
                <p class="text-gray-600 mb-8">Download data desa dalam format yang dapat digunakan</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div v-for="download in dataDownloads" :key="download.name" 
                         class="card text-center hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <component :is="download.icon" class="w-6 h-6 text-blue-600" />
                        </div>
                        <h3 class="font-semibold mb-2">{{ download.name }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ download.description }}</p>
                        <button class="btn-primary w-full">
                            Download {{ download.format }}
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'DataDesa',
    data() {
        return {
            overviewStats: [
                { label: 'Total Penduduk', value: '2,847', change: '+2.3% dari tahun lalu' },
                { label: 'Kepala Keluarga', value: '756', change: '+1.8% dari tahun lalu' },
                { label: 'Luas Wilayah', value: '12.5 km²', change: 'Tidak berubah' },
                { label: 'Kepadatan', value: '227/km²', change: '+2.1% dari tahun lalu' }
            ],
            genderStats: [
                { type: 'Laki-laki', count: '1,481', percentage: 52, color: 'bg-blue-500' },
                { type: 'Perempuan', count: '1,366', percentage: 48, color: 'bg-pink-500' }
            ],
            ageStats: [
                { range: '0-17 tahun', count: '712', percentage: 25 },
                { range: '18-30 tahun', count: '854', percentage: 30 },
                { range: '31-50 tahun', count: '797', percentage: 28 },
                { range: '51+ tahun', count: '484', percentage: 17 }
            ],
            familySizes: [
                { members: '1-2', count: 189, percentage: 25 },
                { members: '3-4', count: 302, percentage: 40 },
                { members: '5-6', count: 189, percentage: 25 },
                { members: '7+', count: 76, percentage: 10 }
            ],
            familyTypes: [
                { name: 'Keluarga Inti', count: 567, percentage: 75 },
                { name: 'Keluarga Besar', count: 151, percentage: 20 },
                { name: 'Keluarga Lainnya', count: 38, percentage: 5 }
            ],
            housingStats: [
                { status: 'Milik Sendiri', count: 567, percentage: 75 },
                { status: 'Sewa', count: 113, percentage: 15 },
                { status: 'Kontrak', count: 38, percentage: 5 },
                { status: 'Lainnya', count: 38, percentage: 5 }
            ],
            educationStats: [
                { level: 'Tidak Sekolah', count: 142, percentage: 5 },
                { level: 'SD', count: 569, percentage: 20 },
                { level: 'SMP', count: 569, percentage: 20 },
                { level: 'SMA', count: 854, percentage: 30 },
                { level: 'D3/S1', count: 569, percentage: 20 },
                { level: 'S2/S3', count: 142, percentage: 5 }
            ],
            employmentStats: [
                { sector: 'Pertanian', count: 569, percentage: 40 },
                { sector: 'Perdagangan', count: 284, percentage: 20 },
                { sector: 'Jasa', count: 284, percentage: 20 },
                { sector: 'Industri', count: 142, percentage: 10 },
                { sector: 'Lainnya', count: 142, percentage: 10 }
            ],
            idmScore: {
                score: 0.72,
                category: 'Maju',
                percentage: 72
            },
            idmDimensions: [
                { name: 'Dimensi Sosial', score: 75 },
                { name: 'Dimensi Ekonomi', score: 68 },
                { name: 'Dimensi Lingkungan', score: 73 }
            ],
            sdgsProgress: [
                { goal: '1', title: 'Tanpa Kemiskinan', progress: 85, status: 'good' },
                { goal: '2', title: 'Tanpa Kelaparan', progress: 90, status: 'good' },
                { goal: '3', title: 'Kesehatan Baik', progress: 78, status: 'medium' },
                { goal: '4', title: 'Pendidikan Berkualitas', progress: 82, status: 'good' },
                { goal: '5', title: 'Kesetaraan Gender', progress: 75, status: 'medium' },
                { goal: '6', title: 'Air Bersih', progress: 88, status: 'good' },
                { goal: '7', title: 'Energi Terjangkau', progress: 92, status: 'good' },
                { goal: '8', title: 'Pekerjaan Layak', progress: 70, status: 'medium' }
            ],
            dataDownloads: [
                {
                    name: 'Data Penduduk',
                    description: 'Data lengkap kependudukan desa',
                    format: 'Excel',
                    icon: 'UserGroupIcon'
                },
                {
                    name: 'Statistik Desa',
                    description: 'Statistik dan indikator desa',
                    format: 'PDF',
                    icon: 'ChartBarIcon'
                },
                {
                    name: 'Peta Desa',
                    description: 'Peta digital wilayah desa',
                    format: 'Shapefile',
                    icon: 'MapIcon'
                }
            ]
        }
    },
    methods: {
        getSDGColor(status) {
            const colors = {
                good: 'bg-green-500',
                medium: 'bg-yellow-500',
                poor: 'bg-red-500'
            };
            return colors[status] || 'bg-gray-500';
        },
        getSDGProgressColor(progress) {
            if (progress >= 80) return 'bg-green-500';
            if (progress >= 60) return 'bg-yellow-500';
            return 'bg-red-500';
        }
    }
}
</script> 