<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Magang - DPUBINMARCIPKA Jateng</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="components/navbar.js"></script>
    <script src="components/footer.js"></script>
</head>
<body class="bg-gray-50">
    <custom-navbar></custom-navbar>
    
    <main class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">FORMULIR PERMOHONAN MAGANG</h1>
            <p class="text-gray-600 mb-6">Dinas Pekerjaan Umum, Bina Marga, Cipta Karya, dan Pengairan Provinsi Jawa Tengah</p>
            
            <form class="space-y-6">
                <!-- Personal Information Section -->
                <section class="border-b pb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">DATA PRIBADI</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                            <div class="flex space-x-4 mt-1">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_kelamin" value="L" class="h-4 w-4 text-blue-600">
                                    <span class="ml-2 text-gray-700">Laki-laki</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_kelamin" value="P" class="h-4 w-4 text-blue-600">
                                    <span class="ml-2 text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Contact Information Section -->
                <section class="border-b pb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">DATA KONTAK</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        
                        <div>
                            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No. HP/WhatsApp</label>
                            <input type="tel" id="no_hp" name="no_hp" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </section>
                
                <!-- Education Information Section -->
                <section class="border-b pb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">DATA PENDIDIKAN</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="universitas" class="block text-sm font-medium text-gray-700 mb-1">Nama Perguruan Tinggi</label>
                            <input type="text" id="universitas" name="universitas" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                            <input type="text" id="jurusan" name="jurusan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                            <input type="number" id="semester" name="semester" min="1" max="14" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="ipk" class="block text-sm font-medium text-gray-700 mb-1">IPK Terakhir</label>
                            <input type="number" id="ipk" name="ipk" step="0.01" min="0" max="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </section>
                
                <!-- Internship Information Section -->
                <section class="border-b pb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">DATA MAGANG</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="tujuan" class="block text-sm font-medium text-gray-700 mb-1">Tujuan Magang</label>
                            <textarea id="tujuan" name="tujuan" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="mulai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                                <input type="date" id="mulai" name="mulai" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="selesai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                                <input type="date" id="selesai" name="selesai" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        
                        <div>
                            <label for="divisi" class="block text-sm font-medium text-gray-700 mb-1">Divisi/Bidang yang Diminati</label>
                            <select id="divisi" name="divisi" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Pilih Divisi --</option>
                                <option value="Bina Marga">Bina Marga</option>
                                <option value="Cipta Karya">Cipta Karya</option>
                                <option value="Pengairan">Pengairan</option>
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="SDA">Sumber Daya Air</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="dokumen" class="block text-sm font-medium text-gray-700 mb-1">Upload Dokumen (Surat Pengantar, CV, dll.)</label>
                            <input type="file" id="dokumen" name="dokumen" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </section>
                
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Kirim Permohonan
                    </button>
                </div>
            </form>
        </div>
    </main>
    
    <custom-footer></custom-footer>
    
    <script>
        feather.replace();
    </script>
    <script src="script.js"></script>
<script src="https://huggingface.co/deepsite/deepsite-badge.js"></script>
</body>
</html>