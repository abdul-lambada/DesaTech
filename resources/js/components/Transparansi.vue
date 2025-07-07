<template>
    <div>
        <!-- Hero Section -->
        <transition name="fade-slide">
        <section class="bg-gradient-to-r from-teal-600 to-blue-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Transparansi</h1>
                <p class="text-xl opacity-90">Informasi keuangan dan pengelolaan anggaran desa yang transparan</p>
            </div>
        </section>
        </transition>

        <!-- Transparency Overview -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Indikator Transparansi</h2>
                    <p class="text-gray-600">Tingkat transparansi dan akuntabilitas pengelolaan desa</p>
                </div>
                <transition-group name="fade-slide" tag="div" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div v-for="(indicator, index) in transparencyIndicators" :key="indicator.name" 
                         class="text-center p-6 bg-gradient-to-br from-teal-50 to-blue-50 rounded-lg"
                         :style="{ transitionDelay: (index * 100) + 'ms' }"
                         data-aos="fade-up">
                        <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">{{ indicator.value }}</div>
                        <div class="text-gray-600 mb-2">{{ indicator.name }}</div>
                        <div class="text-xs text-gray-500">{{ indicator.description }}</div>
                    </div>
                </transition-group>
            </div>
        </section>

        <!-- APBDes Budget -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">APBDes (Anggaran Pendapatan dan Belanja Desa)</h2>
                    <p class="text-gray-600">Rencana dan realisasi anggaran desa tahun {{ currentYear }}</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Budget Overview -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Ringkasan Anggaran</h3>
                        <div class="space-y-6">
                            <div v-for="(budget, index) in budgetOverview" :key="budget.type" 
                                 class="flex items-center justify-between p-4 bg-gray-50 rounded-lg"
                                 data-aos="fade-up"
                                 :style="{ transitionDelay: (index * 100) + 'ms' }">
                                <div>
                                    <h4 class="font-semibold">{{ budget.type }}</h4>
                                    <p class="text-sm text-gray-600">{{ budget.description }}</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg font-bold text-teal-600">{{ budget.amount }}</div>
                                    <div class="text-sm text-gray-500">{{ budget.percentage }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Budget Chart -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Distribusi Anggaran</h3>
                        <div class="space-y-4">
                            <div v-for="(category, index) in budgetCategories" :key="category.name" 
                                 class="flex items-center justify-between"
                                 data-aos="fade-up"
                                 :style="{ transitionDelay: (index * 100) + 'ms' }">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 rounded-full mr-3" :class="category.color"></div>
                                    <span class="font-medium">{{ category.name }}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="w-32 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full" :class="category.color" 
                                             :style="{ width: category.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-20">{{ category.amount }}</span>
                                    <span class="text-sm text-gray-500 w-12">{{ category.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Budget Realization -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Realisasi Anggaran</h2>
                    <p class="text-gray-600">Perbandingan rencana dan realisasi anggaran</p>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="text-left p-4 border-b">Kategori</th>
                                <th class="text-right p-4 border-b">Rencana</th>
                                <th class="text-right p-4 border-b">Realisasi</th>
                                <th class="text-right p-4 border-b">Persentase</th>
                                <th class="text-center p-4 border-b">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(realization, index) in budgetRealization" :key="realization.category" 
                                class="hover:bg-gray-50"
                                data-aos="fade-up"
                                :style="{ transitionDelay: (index * 100) + 'ms' }">
                                <td class="p-4 border-b font-medium">{{ realization.category }}</td>
                                <td class="p-4 border-b text-right">{{ realization.planned }}</td>
                                <td class="p-4 border-b text-right">{{ realization.actual }}</td>
                                <td class="p-4 border-b text-right">
                                    <span :class="getRealizationClass(realization.percentage)">
                                        {{ realization.percentage }}%
                                    </span>
                                </td>
                                <td class="p-4 border-b text-center">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium"
                                          :class="getStatusClass(realization.status)">
                                        {{ realization.status }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Social Assistance -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Bantuan Sosial</h2>
                    <p class="text-gray-600">Data penerima dan distribusi bantuan sosial</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Assistance Programs -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Program Bantuan</h3>
                        <div class="space-y-4">
                            <div v-for="(program, index) in assistancePrograms" :key="program.name" 
                                 class="flex items-center justify-between p-4 bg-gray-50 rounded-lg"
                                 data-aos="fade-up"
                                 :style="{ transitionDelay: (index * 100) + 'ms' }">
                                <div>
                                    <h4 class="font-semibold">{{ program.name }}</h4>
                                    <p class="text-sm text-gray-600">{{ program.description }}</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg font-bold text-teal-600">{{ program.recipients }}</div>
                                    <div class="text-sm text-gray-500">penerima</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipients by Category -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Penerima Berdasarkan Kategori</h3>
                        <div class="space-y-4">
                            <div v-for="(category, index) in recipientCategories" :key="category.name" 
                                 class="flex items-center justify-between"
                                 data-aos="fade-up"
                                 :style="{ transitionDelay: (index * 100) + 'ms' }">
                                <span class="font-medium">{{ category.name }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-32 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full bg-teal-600" 
                                             :style="{ width: category.percentage + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-16">{{ category.count }}</span>
                                    <span class="text-sm text-gray-500 w-12">{{ category.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Financial Reports -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Laporan Keuangan</h2>
                    <p class="text-gray-600">Laporan keuangan desa yang dapat diunduh</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="(report, index) in financialReports" :key="report.name" 
                         class="card hover:shadow-lg transition-shadow duration-300"
                         data-aos="fade-up"
                         :style="{ transitionDelay: (index * 100) + 'ms' }">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center">
                                <component :is="report.icon" class="w-6 h-6 text-teal-600" />
                            </div>
                            <span class="text-xs bg-teal-100 text-teal-800 px-2 py-1 rounded-full">
                                {{ report.type }}
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ report.name }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ report.description }}</p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ report.date }}</span>
                            <span>{{ report.size }}</span>
                        </div>
                        <button class="w-full btn-primary bg-teal-600 hover:bg-teal-700"
                                data-aos="fade-up"
                                :style="{ transitionDelay: (index * 100) + 'ms' }">
                            Download PDF
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Transparency Score -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Skor Transparansi Desa</h2>
                    <p class="text-gray-600">Indikator tingkat transparansi dan akuntabilitas</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Overall Score -->
                    <div class="card text-center">
                        <h3 class="text-xl font-semibold mb-6">Skor Keseluruhan</h3>
                        <div class="mb-6">
                            <div class="text-6xl font-bold text-teal-600 mb-2">{{ transparencyScore.overall }}</div>
                            <div class="text-lg text-gray-600 mb-4">{{ transparencyScore.category }}</div>
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div class="h-4 rounded-full bg-gradient-to-r from-red-500 to-yellow-500 to-green-500" 
                                     :style="{ width: transparencyScore.percentage + '%' }"></div>
                            </div>
                        </div>
                        <p class="text-gray-600">{{ transparencyScore.description }}</p>
                    </div>

                    <!-- Detailed Scores -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Skor Detail</h3>
                        <div class="space-y-4">
                            <div v-for="(score, index) in detailedScores" :key="score.aspect" 
                                 class="flex items-center justify-between"
                                 data-aos="fade-up"
                                 :style="{ transitionDelay: (index * 100) + 'ms' }">
                                <span class="font-medium">{{ score.aspect }}</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-32 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full" 
                                             :class="getScoreColor(score.score)"
                                             :style="{ width: score.score + '%' }"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-12">{{ score.score }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Public Information -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Informasi Publik</h2>
                    <p class="text-gray-600">Informasi yang wajib disediakan dan dapat diakses publik</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="(info, index) in publicInformation" :key="info.name" 
                         class="card hover:shadow-lg transition-shadow duration-300"
                         data-aos="fade-up"
                         :style="{ transitionDelay: (index * 100) + 'ms' }">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <component :is="info.icon" class="w-6 h-6 text-blue-600" />
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ info.name }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ info.description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Update: {{ info.lastUpdate }}</span>
                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                                Lihat Detail →
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'Transparansi',
    data() {
        return {
            currentYear: new Date().getFullYear(),
            transparencyIndicators: [
                { name: 'Skor Transparansi', value: '85%', description: 'Tingkat transparansi desa' },
                { name: 'Akuntabilitas', value: '92%', description: 'Tingkat akuntabilitas' },
                { name: 'Partisipasi', value: '78%', description: 'Tingkat partisipasi warga' },
                { name: 'Kepatuhan', value: '88%', description: 'Tingkat kepatuhan regulasi' }
            ],
            budgetOverview: [
                {
                    type: 'Total Pendapatan',
                    description: 'Seluruh sumber pendapatan desa',
                    amount: 'Rp 2.5 M',
                    percentage: 100
                },
                {
                    type: 'Total Belanja',
                    description: 'Seluruh pengeluaran desa',
                    amount: 'Rp 2.3 M',
                    percentage: 92
                },
                {
                    type: 'Surplus',
                    description: 'Sisa anggaran tahun berjalan',
                    amount: 'Rp 200 Jt',
                    percentage: 8
                }
            ],
            budgetCategories: [
                { name: 'Penyelenggaraan Pemerintahan', amount: 'Rp 500 Jt', percentage: 20, color: 'bg-blue-500' },
                { name: 'Pelaksanaan Pembangunan', amount: 'Rp 1.2 M', percentage: 48, color: 'bg-green-500' },
                { name: 'Pembinaan Kemasyarakatan', amount: 'Rp 400 Jt', percentage: 16, color: 'bg-yellow-500' },
                { name: 'Pemberdayaan Masyarakat', amount: 'Rp 300 Jt', percentage: 12, color: 'bg-purple-500' },
                { name: 'Tak Terduga', amount: 'Rp 100 Jt', percentage: 4, color: 'bg-red-500' }
            ],
            budgetRealization: [
                {
                    category: 'Penyelenggaraan Pemerintahan',
                    planned: 'Rp 500 Jt',
                    actual: 'Rp 480 Jt',
                    percentage: 96,
                    status: 'Baik'
                },
                {
                    category: 'Pelaksanaan Pembangunan',
                    planned: 'Rp 1.2 M',
                    actual: 'Rp 1.15 M',
                    percentage: 95.8,
                    status: 'Baik'
                },
                {
                    category: 'Pembinaan Kemasyarakatan',
                    planned: 'Rp 400 Jt',
                    actual: 'Rp 380 Jt',
                    percentage: 95,
                    status: 'Baik'
                },
                {
                    category: 'Pemberdayaan Masyarakat',
                    planned: 'Rp 300 Jt',
                    actual: 'Rp 290 Jt',
                    percentage: 96.7,
                    status: 'Baik'
                },
                {
                    category: 'Tak Terduga',
                    planned: 'Rp 100 Jt',
                    actual: 'Rp 80 Jt',
                    percentage: 80,
                    status: 'Cukup'
                }
            ],
            assistancePrograms: [
                {
                    name: 'Bantuan Tunai Desa',
                    description: 'Bantuan tunai untuk keluarga miskin',
                    recipients: 150
                },
                {
                    name: 'Bantuan Pangan',
                    description: 'Bantuan sembako untuk warga kurang mampu',
                    recipients: 200
                },
                {
                    name: 'Bantuan Pendidikan',
                    description: 'Beasiswa untuk siswa berprestasi',
                    recipients: 50
                },
                {
                    name: 'Bantuan Kesehatan',
                    description: 'Bantuan biaya pengobatan',
                    recipients: 75
                }
            ],
            recipientCategories: [
                { name: 'Keluarga Miskin', count: 200, percentage: 40 },
                { name: 'Lansia', count: 150, percentage: 30 },
                { name: 'Disabilitas', count: 75, percentage: 15 },
                { name: 'Anak Yatim', count: 50, percentage: 10 },
                { name: 'Lainnya', count: 25, percentage: 5 }
            ],
            financialReports: [
                {
                    name: 'Laporan Realisasi APBDes',
                    description: 'Laporan realisasi anggaran desa triwulan IV',
                    type: 'Triwulan',
                    date: 'Desember 2024',
                    size: '2.5 MB',
                    icon: 'DocumentIcon'
                },
                {
                    name: 'Laporan Pertanggungjawaban',
                    description: 'Laporan pertanggungjawaban kepala desa',
                    type: 'Tahunan',
                    date: 'Desember 2024',
                    size: '1.8 MB',
                    icon: 'ClipboardIcon'
                },
                {
                    name: 'Laporan Keuangan',
                    description: 'Laporan keuangan desa tahun 2024',
                    type: 'Tahunan',
                    date: 'Desember 2024',
                    size: '3.2 MB',
                    icon: 'ChartBarIcon'
                },
                {
                    name: 'Rencana APBDes 2025',
                    description: 'Rencana anggaran desa tahun 2025',
                    type: 'Rencana',
                    date: 'Januari 2025',
                    size: '2.1 MB',
                    icon: 'CalendarIcon'
                },
                {
                    name: 'Laporan Aset Desa',
                    description: 'Laporan inventaris aset desa',
                    type: 'Inventaris',
                    date: 'Desember 2024',
                    size: '1.5 MB',
                    icon: 'HomeIcon'
                },
                {
                    name: 'Laporan Bantuan Sosial',
                    description: 'Laporan distribusi bantuan sosial',
                    type: 'Bantuan',
                    date: 'Desember 2024',
                    size: '1.2 MB',
                    icon: 'HeartIcon'
                }
            ],
            transparencyScore: {
                overall: 85,
                category: 'Sangat Baik',
                percentage: 85,
                description: 'Desa ini memiliki tingkat transparansi yang sangat baik dengan skor 85 dari 100.'
            },
            detailedScores: [
                { aspect: 'Keterbukaan Informasi', score: 90 },
                { aspect: 'Akuntabilitas Keuangan', score: 88 },
                { aspect: 'Partisipasi Masyarakat', score: 78 },
                { aspect: 'Kepatuhan Regulasi', score: 92 },
                { aspect: 'Akses Informasi', score: 82 },
                { aspect: 'Pelaporan Publik', score: 80 }
            ],
            publicInformation: [
                {
                    name: 'Profil Desa',
                    description: 'Informasi umum dan profil desa',
                    lastUpdate: '15 Des 2024',
                    icon: 'InformationCircleIcon'
                },
                {
                    name: 'Struktur Organisasi',
                    description: 'Struktur pemerintahan dan organisasi desa',
                    lastUpdate: '10 Des 2024',
                    icon: 'UserGroupIcon'
                },
                {
                    name: 'Peraturan Desa',
                    description: 'Peraturan dan kebijakan desa',
                    lastUpdate: '5 Des 2024',
                    icon: 'DocumentTextIcon'
                },
                {
                    name: 'Laporan Kegiatan',
                    description: 'Laporan kegiatan dan program desa',
                    lastUpdate: '20 Des 2024',
                    icon: 'ClipboardListIcon'
                },
                {
                    name: 'Data Penduduk',
                    description: 'Data kependudukan dan statistik desa',
                    lastUpdate: '12 Des 2024',
                    icon: 'UserIcon'
                },
                {
                    name: 'Pengaduan Masyarakat',
                    description: 'Sistem pengaduan dan keluhan warga',
                    lastUpdate: '18 Des 2024',
                    icon: 'ChatIcon'
                }
            ]
        }
    },
    methods: {
        getRealizationClass(percentage) {
            if (percentage >= 95) return 'text-green-600 font-semibold';
            if (percentage >= 85) return 'text-yellow-600 font-semibold';
            return 'text-red-600 font-semibold';
        },
        getStatusClass(status) {
            const classes = {
                'Baik': 'bg-green-100 text-green-800',
                'Cukup': 'bg-yellow-100 text-yellow-800',
                'Kurang': 'bg-red-100 text-red-800'
            };
            return classes[status] || 'bg-gray-100 text-gray-800';
        },
        getScoreColor(score) {
            if (score >= 85) return 'bg-green-500';
            if (score >= 70) return 'bg-yellow-500';
            return 'bg-red-500';
        }
    }
}
</script> 

<style scoped>
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