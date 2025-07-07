<template>
    <div>
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Kontak & Lokasi</h1>
                <p class="text-xl opacity-90">Hubungi kami dan temukan lokasi desa</p>
            </div>
        </section>

        <!-- Quick Contact -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Kontak Cepat</h2>
                    <p class="text-gray-600">Hubungi kami melalui berbagai saluran komunikasi</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div v-for="contact in quickContacts" :key="contact.type" 
                         class="text-center p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-lg">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <component :is="contact.icon" class="w-8 h-8 text-indigo-600" />
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ contact.type }}</h3>
                        <p class="text-gray-600 mb-4">{{ contact.description }}</p>
                        <div class="space-y-2">
                            <div v-for="info in contact.info" :key="info" 
                                 class="text-indigo-600 font-medium">{{ info }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Village Map -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Peta Desa</h2>
                    <p class="text-gray-600">Lokasi dan batas wilayah desa</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Map -->
                    <div class="relative">
                        <div class="bg-gray-200 rounded-lg h-96 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m-6 3l6-3"/>
                                </svg>
                                <p class="text-gray-500">Peta Interaktif Desa</p>
                                <p class="text-sm text-gray-400">Klik untuk melihat peta lengkap</p>
                            </div>
                        </div>
                        <button class="absolute bottom-4 right-4 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                            Lihat Peta Lengkap
                        </button>
                    </div>

                    <!-- Location Info -->
                    <div class="space-y-6">
                        <div class="card">
                            <h3 class="text-xl font-semibold mb-4">Informasi Lokasi</h3>
                            <div class="space-y-4">
                                <div v-for="info in locationInfo" :key="info.label" 
                                     class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <component :is="info.icon" class="w-4 h-4 text-indigo-600" />
                                    </div>
                                    <div>
                                        <h4 class="font-medium">{{ info.label }}</h4>
                                        <p class="text-gray-600">{{ info.value }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="text-xl font-semibold mb-4">Batas Wilayah</h3>
                            <div class="space-y-3">
                                <div v-for="boundary in boundaries" :key="boundary.direction" 
                                     class="flex justify-between items-center">
                                    <span class="font-medium">{{ boundary.direction }}</span>
                                    <span class="text-gray-600">{{ boundary.area }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Village Officials -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Kontak Perangkat Desa</h2>
                    <p class="text-gray-600">Hubungi perangkat desa untuk berbagai keperluan</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="official in villageOfficials" :key="official.name" 
                         class="card text-center hover:shadow-lg transition-shadow duration-300">
                        <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-1">{{ official.name }}</h3>
                        <p class="text-indigo-600 font-medium mb-3">{{ official.position }}</p>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span class="text-gray-600">{{ official.phone }}</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-gray-600">{{ official.email }}</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-xs text-gray-500">{{ official.officeHours }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Kirim Pesan</h2>
                    <p class="text-gray-600">Sampaikan pertanyaan, saran, atau keluhan Anda</p>
                </div>
                
                <div class="card">
                    <form @submit.prevent="submitContactForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap *
                                </label>
                                <input v-model="contactForm.name" type="text" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="Masukkan nama lengkap">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Email *
                                </label>
                                <input v-model="contactForm.email" type="email" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="contoh@email.com">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor Telepon
                                </label>
                                <input v-model="contactForm.phone" type="tel"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="08xxxxxxxxxx">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori *
                                </label>
                                <select v-model="contactForm.category" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="">Pilih kategori</option>
                                    <option value="layanan">Layanan Desa</option>
                                    <option value="pengaduan">Pengaduan</option>
                                    <option value="saran">Saran & Kritik</option>
                                    <option value="informasi">Permintaan Informasi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Subjek *
                            </label>
                            <input v-model="contactForm.subject" type="text" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Masukkan subjek pesan">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Pesan *
                            </label>
                            <textarea v-model="contactForm.message" rows="6" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                      placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        
                        <div class="flex items-center">
                            <input v-model="contactForm.agreement" type="checkbox" required
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label class="ml-2 block text-sm text-gray-700">
                                Saya setuju dengan <a href="#" class="text-indigo-600 hover:text-indigo-500">kebijakan privasi</a> 
                                dan <a href="#" class="text-indigo-600 hover:text-indigo-500">ketentuan penggunaan</a>
                            </label>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn-primary bg-indigo-600 hover:bg-indigo-700 px-8 py-3">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Office Hours -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="section-title">Jam Operasional</h2>
                    <p class="text-gray-600">Waktu pelayanan kantor desa</p>
                </div>
                
                <div class="max-w-2xl mx-auto">
                    <div class="card">
                        <div class="space-y-4">
                            <div v-for="schedule in officeSchedule" :key="schedule.day" 
                                 class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                        <span class="text-indigo-600 font-semibold">{{ schedule.dayShort }}</span>
                                    </div>
                                    <span class="font-medium">{{ schedule.day }}</span>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold">{{ schedule.hours }}</div>
                                    <div class="text-sm text-gray-500">{{ schedule.status }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-yellow-800">
                                    Istirahat: 12:00 - 13:00 WIB (Senin - Jumat)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'Kontak',
    data() {
        return {
            contactForm: {
                name: '',
                email: '',
                phone: '',
                category: '',
                subject: '',
                message: '',
                agreement: false
            },
            quickContacts: [
                {
                    type: 'Telepon',
                    description: 'Hubungi kami melalui telepon',
                    icon: 'PhoneIcon',
                    info: ['(021) 1234-5678', '(021) 1234-5679']
                },
                {
                    type: 'Email',
                    description: 'Kirim pesan melalui email',
                    icon: 'MailIcon',
                    info: ['info@desatech.id', 'admin@desatech.id']
                },
                {
                    type: 'WhatsApp',
                    description: 'Chat dengan kami di WhatsApp',
                    icon: 'ChatIcon',
                    info: ['+62 812-3456-7890', '+62 812-3456-7891']
                }
            ],
            locationInfo: [
                {
                    label: 'Alamat Kantor Desa',
                    value: 'Jl. Desa No. 123, Kecamatan, Kabupaten, Provinsi 12345',
                    icon: 'LocationMarkerIcon'
                },
                {
                    label: 'Koordinat GPS',
                    value: '-6.2088° S, 106.8456° E',
                    icon: 'GlobeAltIcon'
                },
                {
                    label: 'Luas Wilayah',
                    value: '12.5 km²',
                    icon: 'MapIcon'
                },
                {
                    label: 'Ketinggian',
                    value: '150-200 meter di atas permukaan laut',
                    icon: 'MountainIcon'
                }
            ],
            boundaries: [
                { direction: 'Utara', area: 'Desa Sebelah Utara' },
                { direction: 'Selatan', area: 'Desa Sebelah Selatan' },
                { direction: 'Barat', area: 'Desa Sebelah Barat' },
                { direction: 'Timur', area: 'Desa Sebelah Timur' }
            ],
            villageOfficials: [
                {
                    name: 'Ahmad Supriyadi',
                    position: 'Kepala Desa',
                    phone: '(021) 1234-5678',
                    email: 'kepaladesa@desatech.id',
                    officeHours: 'Senin - Jumat, 08:00 - 16:00 WIB'
                },
                {
                    name: 'Siti Nurhaliza',
                    position: 'Sekretaris Desa',
                    phone: '(021) 1234-5679',
                    email: 'sekretaris@desatech.id',
                    officeHours: 'Senin - Jumat, 08:00 - 16:00 WIB'
                },
                {
                    name: 'Budi Santoso',
                    position: 'Kasi Pemerintahan',
                    phone: '(021) 1234-5680',
                    email: 'pemerintahan@desatech.id',
                    officeHours: 'Senin - Jumat, 08:00 - 16:00 WIB'
                },
                {
                    name: 'Dewi Sartika',
                    position: 'Kasi Kesejahteraan',
                    phone: '(021) 1234-5681',
                    email: 'kesejahteraan@desatech.id',
                    officeHours: 'Senin - Jumat, 08:00 - 16:00 WIB'
                },
                {
                    name: 'Rudi Hartono',
                    position: 'Kasi Pelayanan',
                    phone: '(021) 1234-5682',
                    email: 'pelayanan@desatech.id',
                    officeHours: 'Senin - Jumat, 08:00 - 16:00 WIB'
                },
                {
                    name: 'Maya Indah',
                    position: 'Kaur Keuangan',
                    phone: '(021) 1234-5683',
                    email: 'keuangan@desatech.id',
                    officeHours: 'Senin - Jumat, 08:00 - 16:00 WIB'
                }
            ],
            officeSchedule: [
                { day: 'Senin', dayShort: 'SEN', hours: '08:00 - 16:00 WIB', status: 'Buka' },
                { day: 'Selasa', dayShort: 'SEL', hours: '08:00 - 16:00 WIB', status: 'Buka' },
                { day: 'Rabu', dayShort: 'RAB', hours: '08:00 - 16:00 WIB', status: 'Buka' },
                { day: 'Kamis', dayShort: 'KAM', hours: '08:00 - 16:00 WIB', status: 'Buka' },
                { day: 'Jumat', dayShort: 'JUM', hours: '08:00 - 16:00 WIB', status: 'Buka' },
                { day: 'Sabtu', dayShort: 'SAB', hours: '08:00 - 12:00 WIB', status: 'Setengah Hari' },
                { day: 'Minggu', dayShort: 'MIN', hours: '-', status: 'Tutup' }
            ]
        }
    },
    methods: {
        submitContactForm() {
            // Implement form submission logic
            alert('Pesan berhasil dikirim! Kami akan menghubungi Anda segera.');
            this.contactForm = {
                name: '',
                email: '',
                phone: '',
                category: '',
                subject: '',
                message: '',
                agreement: false
            };
        }
    }
}
</script> 