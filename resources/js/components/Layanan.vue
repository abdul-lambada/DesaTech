<template>
    <div>
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Layanan Desa</h1>
                <p class="text-xl opacity-90">Akses layanan publik dengan mudah dan cepat</p>
            </div>
        </section>

        <!-- Service Categories -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Kategori Layanan</h2>
                    <p class="text-gray-600">Pilih layanan yang Anda butuhkan</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div v-for="category in serviceCategories" :key="category.name" 
                         class="card text-center hover:shadow-lg transition-all duration-300 hover:-translate-y-1 cursor-pointer"
                         @click="selectedCategory = category.name">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <component :is="category.icon" class="w-8 h-8 text-green-600" />
                        </div>
                        <h3 class="text-xl font-semibold mb-3">{{ category.name }}</h3>
                        <p class="text-gray-600 mb-4">{{ category.description }}</p>
                        <div class="text-sm text-green-600 font-medium">{{ category.count }} layanan tersedia</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Letter Services -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Pelayanan Surat</h2>
                    <p class="text-gray-600">Layanan administrasi dan surat-menyurat</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="service in letterServices" :key="service.name" 
                         class="card hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <component :is="service.icon" class="w-6 h-6 text-blue-600" />
                            </div>
                            <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                {{ service.duration }}
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ service.name }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ service.description }}</p>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm">
                                <span class="font-medium">Syarat:</span>
                                <ul class="list-disc list-inside text-gray-600 mt-1">
                                    <li v-for="requirement in service.requirements" :key="requirement">
                                        {{ requirement }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button @click="openServiceModal(service)" 
                                class="w-full btn-primary">
                            Ajukan Permohonan
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Proposal Submission -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Pengajuan Proposal & Aspirasi</h2>
                    <p class="text-gray-600">Sampaikan usulan dan aspirasi Anda untuk kemajuan desa</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Proposal Form -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Form Pengajuan Proposal</h3>
                        <form @submit.prevent="submitProposal" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis Proposal
                                </label>
                                <select v-model="proposalForm.type" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Pilih jenis proposal</option>
                                    <option value="infrastruktur">Infrastruktur</option>
                                    <option value="ekonomi">Ekonomi</option>
                                    <option value="pendidikan">Pendidikan</option>
                                    <option value="kesehatan">Kesehatan</option>
                                    <option value="lingkungan">Lingkungan</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Judul Proposal
                                </label>
                                <input v-model="proposalForm.title" type="text" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       placeholder="Masukkan judul proposal">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi
                                </label>
                                <textarea v-model="proposalForm.description" rows="4" required
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                          placeholder="Jelaskan detail proposal Anda"></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Estimasi Anggaran
                                </label>
                                <input v-model="proposalForm.budget" type="number" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       placeholder="Rp 0">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    File Lampiran
                                </label>
                                <input type="file" @change="handleFileUpload"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <button type="submit" class="w-full btn-primary">
                                Kirim Proposal
                            </button>
                        </form>
                    </div>

                    <!-- Recent Proposals -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6">Proposal Terbaru</h3>
                        <div class="space-y-4">
                            <div v-for="proposal in recentProposals" :key="proposal.id" 
                                 class="card hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="font-semibold">{{ proposal.title }}</h4>
                                    <span class="text-xs px-2 py-1 rounded-full"
                                          :class="getStatusClass(proposal.status)">
                                        {{ proposal.status }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">{{ proposal.description }}</p>
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span>{{ proposal.date }}</span>
                                    <span>{{ proposal.type }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Schedule -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Jadwal Pelayanan</h2>
                    <p class="text-gray-600">Jam operasional dan jadwal pelayanan desa</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Office Hours -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Jam Operasional</h3>
                        <div class="space-y-4">
                            <div v-for="schedule in officeSchedule" :key="schedule.day" 
                                 class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium">{{ schedule.day }}</span>
                                <span class="text-gray-600">{{ schedule.hours }}</span>
                            </div>
                        </div>
                        <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-yellow-800">
                                    Istirahat: 12:00 - 13:00 WIB
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Service Calendar -->
                    <div class="card">
                        <h3 class="text-xl font-semibold mb-6">Kalender Layanan</h3>
                        <div class="space-y-4">
                            <div v-for="event in serviceEvents" :key="event.id" 
                                 class="flex items-start space-x-4 p-4 bg-blue-50 rounded-lg">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                                    {{ event.date }}
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold mb-1">{{ event.title }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ event.description }}</p>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ event.time }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Modal -->
        <div v-if="showServiceModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">{{ selectedService?.name }}</h3>
                    <button @click="closeServiceModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                <div v-if="selectedService" class="space-y-4">
                    <p class="text-gray-600">{{ selectedService.description }}</p>
                    
                    <div>
                        <h4 class="font-medium mb-2">Syarat yang diperlukan:</h4>
                        <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                            <li v-for="requirement in selectedService.requirements" :key="requirement">
                                {{ requirement }}
                            </li>
                        </ul>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">Estimasi waktu:</span>
                        <span class="font-medium">{{ selectedService.duration }}</span>
                    </div>
                    
                    <div class="flex space-x-3">
                        <button @click="closeServiceModal" class="flex-1 btn-secondary">
                            Batal
                        </button>
                        <button @click="startService" class="flex-1 btn-primary">
                            Mulai Layanan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Layanan',
    data() {
        return {
            selectedCategory: null,
            showServiceModal: false,
            selectedService: null,
            proposalForm: {
                type: '',
                title: '',
                description: '',
                budget: '',
                file: null
            },
            serviceCategories: [
                {
                    name: 'Surat Keterangan',
                    description: 'Layanan administrasi dan surat-menyurat',
                    icon: 'DocumentIcon',
                    count: 8
                },
                {
                    name: 'Proposal & Aspirasi',
                    description: 'Pengajuan proposal dan saran pembangunan',
                    icon: 'ClipboardIcon',
                    count: 5
                },
                {
                    name: 'Layanan Khusus',
                    description: 'Layanan khusus untuk warga tertentu',
                    icon: 'StarIcon',
                    count: 3
                }
            ],
            letterServices: [
                {
                    name: 'Surat Keterangan Domisili',
                    description: 'Surat keterangan tempat tinggal',
                    icon: 'HomeIcon',
                    duration: '1-2 hari',
                    requirements: [
                        'Fotokopi KTP',
                        'Fotokopi KK',
                        'Surat pengantar RT/RW'
                    ]
                },
                {
                    name: 'Surat Keterangan Usaha',
                    description: 'Surat keterangan usaha untuk UMKM',
                    icon: 'BriefcaseIcon',
                    duration: '2-3 hari',
                    requirements: [
                        'Fotokopi KTP',
                        'Fotokopi KK',
                        'Surat pengantar RT/RW',
                        'Foto lokasi usaha'
                    ]
                },
                {
                    name: 'Surat Pengantar KTP',
                    description: 'Pengajuan pembuatan KTP baru',
                    icon: 'IdentificationIcon',
                    duration: '3-5 hari',
                    requirements: [
                        'Fotokopi KK',
                        'Surat pengantar RT/RW',
                        'Foto 3x4 (2 lembar)'
                    ]
                },
                {
                    name: 'Surat Pengantar KK',
                    description: 'Pengajuan pembuatan KK baru',
                    icon: 'UserGroupIcon',
                    duration: '3-5 hari',
                    requirements: [
                        'Fotokopi KTP',
                        'Surat pengantar RT/RW',
                        'Surat nikah (jika ada)'
                    ]
                },
                {
                    name: 'Surat Keterangan Tidak Mampu',
                    description: 'Surat keterangan untuk bantuan sosial',
                    icon: 'HeartIcon',
                    duration: '2-3 hari',
                    requirements: [
                        'Fotokopi KTP',
                        'Fotokopi KK',
                        'Surat pengantar RT/RW',
                        'Surat keterangan penghasilan'
                    ]
                },
                {
                    name: 'Surat Pengantar SKCK',
                    description: 'Pengajuan Surat Keterangan Catatan Kepolisian',
                    icon: 'ShieldCheckIcon',
                    duration: '1-2 hari',
                    requirements: [
                        'Fotokopi KTP',
                        'Fotokopi KK',
                        'Surat pengantar RT/RW',
                        'Foto 3x4 (2 lembar)'
                    ]
                }
            ],
            recentProposals: [
                {
                    id: 1,
                    title: 'Pembangunan Jalan Desa',
                    description: 'Proposal pembangunan jalan desa untuk meningkatkan aksesibilitas',
                    type: 'Infrastruktur',
                    status: 'Diterima',
                    date: '15 Des 2024'
                },
                {
                    id: 2,
                    title: 'Pelatihan UMKM Digital',
                    description: 'Program pelatihan untuk meningkatkan kompetensi UMKM',
                    type: 'Ekonomi',
                    status: 'Proses',
                    date: '12 Des 2024'
                },
                {
                    id: 3,
                    title: 'Posyandu Lansia',
                    description: 'Pembentukan posyandu khusus untuk lansia',
                    type: 'Kesehatan',
                    status: 'Diterima',
                    date: '10 Des 2024'
                }
            ],
            officeSchedule: [
                { day: 'Senin - Jumat', hours: '08:00 - 16:00 WIB' },
                { day: 'Sabtu', hours: '08:00 - 12:00 WIB' },
                { day: 'Minggu', hours: 'Tutup' }
            ],
            serviceEvents: [
                {
                    id: 1,
                    date: '20 Des',
                    title: 'Pelayanan Khusus Lansia',
                    description: 'Layanan administrasi khusus untuk warga lansia',
                    time: '09:00 - 11:00 WIB'
                },
                {
                    id: 2,
                    date: '22 Des',
                    title: 'Posyandu Balita',
                    description: 'Pemeriksaan kesehatan balita dan imunisasi',
                    time: '08:00 - 12:00 WIB'
                },
                {
                    id: 3,
                    date: '25 Des',
                    title: 'Pelayanan KTP & KK',
                    description: 'Layanan khusus pembuatan KTP dan KK',
                    time: '08:00 - 16:00 WIB'
                }
            ]
        }
    },
    methods: {
        openServiceModal(service) {
            this.selectedService = service;
            this.showServiceModal = true;
        },
        closeServiceModal() {
            this.showServiceModal = false;
            this.selectedService = null;
        },
        startService() {
            // Implement service start logic
            alert('Layanan akan dimulai. Silakan siapkan dokumen yang diperlukan.');
            this.closeServiceModal();
        },
        handleFileUpload(event) {
            this.proposalForm.file = event.target.files[0];
        },
        submitProposal() {
            // Implement proposal submission logic
            alert('Proposal berhasil dikirim! Kami akan menghubungi Anda segera.');
            this.proposalForm = {
                type: '',
                title: '',
                description: '',
                budget: '',
                file: null
            };
        },
        getStatusClass(status) {
            const classes = {
                'Diterima': 'bg-green-100 text-green-800',
                'Proses': 'bg-yellow-100 text-yellow-800',
                'Ditolak': 'bg-red-100 text-red-800'
            };
            return classes[status] || 'bg-gray-100 text-gray-800';
        }
    }
}
</script> 