<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kunjungan Tamu Dinas ESDM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a73e8',
                        secondary: '#34a853',
                    }
                }
            }
        }
    </script>
    <style>
        /* Gaya dari kode asli */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }
        
        @keyframes countUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .animate-pulse-custom {
            animation: pulse 2s ease-in-out infinite;
        }
        
        .animate-count-up {
            animation: countUp 1s ease-out;
        }
        
        .shimmer-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 2s infinite;
        }
        
        /* Glass morphism custom */
        .glass-card {
            background: rgba(249, 245, 245, 0.62);
            backdrop-filter: saturate(180%) blur(20px);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
        }
        
        /* Gradient text */
        .gradient-text-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .gradient-text-secondary {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .gradient-text-tertiary {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Chart styles - TIDAK DIUBAH */
        .chart-container {
            position: relative;
            height: 200px;
        }
        
        .chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            height: 150px;
            margin-top: 10px;
        }
        
        .chart-bar {
            width: 30px;
            background-color: #1a73e8;
            border-radius: 4px 4px 0 0;
            position: relative;
            transition: height 0.3s ease;
        }
        
        .chart-label {
            position: absolute;
            bottom: -25px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #5f6368;
        }
        
        /* Gaya tambahan untuk Navbar yang baru */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            padding: 0.5rem 1rem;
            color: #4b5563; /* text-gray-600 */
            font-weight: 500; /* font-medium */
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #1a73e8; /* primary color */
        }

        .nav-link.active {
            color: #1a73e8;
            border-bottom: 2px solid #1a73e8;
        }
    </style>
</head>
<body class="bg-white min-h-screen">
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute inset-0 bg-gradient-radial from-indigo-50/30 via-transparent to-transparent"></div>
    </div>
    
    <div class="navbar sticky top-0 z-50">
        <div class="navbar-logo" style="margin-left: 50px">
            <img src="./img/logo.png" alt="Logo DPU" style="width: 50px; height: 50px; margin-left: 20px;">
            <div>
                <h1 style="color: #1a56a7; font-weight: 600; font-size: 18px;"> Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah</h1>
                </div>
        </div>
        <div style="display: flex; align-items: center; gap: 10px; margin-right: 50px;">
            <nav class="navbar-menu" style="display: flex; align-items: center; gap: 10px;">
                <a href="{{url('/')}}" class="nav-link active"> Beranda</a>
                <a href="{{url('/maps')}}" class="nav-link"> Peta</a>
            </nav>
            <div class="flex items-center gap-3 px-4 py-2 bg-blue-50/50 rounded-full hover:bg-blue-100/50 transition-all duration-300 hover:-translate-y-0.5">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-lg">
                    KD
                </div>
                <span class="font-semibold text-gray-700">Kepala Dinas</span>
            </div>
        </div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto p-5 sm:p-6 lg:p-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
            <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 text-center relative overflow-hidden group hover:-translate-y-2 hover:shadow-xl transition-all duration-300">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
                <div class="shimmer-effect"></div>
                <div class="text-5xl font-extrabold gradient-text-primary animate-count-up mb-2">32</div>
                <div class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Tamu di Kantor</div>
            </div>
            
            <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 text-center relative overflow-hidden group hover:-translate-y-2 hover:shadow-xl transition-all duration-300">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pink-400 to-red-500"></div>
                <div class="shimmer-effect"></div>
                <div class="text-5xl font-extrabold gradient-text-secondary animate-count-up mb-2">29</div>
                <div class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Tamu Hari Ini</div>
            </div>
            
            <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 text-center relative overflow-hidden group hover:-translate-y-2 hover:shadow-xl transition-all duration-300">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-400 to-blue-500"></div>
                <div class="shimmer-effect"></div>
                <div class="text-5xl font-extrabold gradient-text-tertiary animate-count-up mb-2">3</div>
                <div class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Tamu Bulan Ini</div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <div class="lg:col-span-2 space-y-5">
                <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="flex justify-between items-center pb-4 mb-5 border-b-2 border-indigo-100">
                        <h2 class="text-base font-bold gradient-text-primary uppercase tracking-wide">Kunjungan Hari Ini</h2>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gradient-to-r from-indigo-50/50 to-purple-50/50 border-l-4 border-indigo-500 hover:translate-x-2 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-bold rounded-full shadow-md">EXTERNAL</span>
                            <span class="text-sm font-medium text-gray-700">Rapat Koordinasi Pembangunan Jalan</span>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gradient-to-r from-pink-50/50 to-red-50/50 border-l-4 border-pink-500 hover:translate-x-2 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-pink-400 to-red-500 text-white text-xs font-bold rounded-full shadow-md">INTERNAL</span>
                            <span class="text-sm font-medium text-gray-700">Evaluasi Kinerja Triwulan</span>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gradient-to-r from-indigo-50/50 to-purple-50/50 border-l-4 border-indigo-500 hover:translate-x-2 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-bold rounded-full shadow-md">EXTERNAL</span>
                            <span class="text-sm font-medium text-gray-700">Kunjungan Kerja ke Proyek Jembatan</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="flex justify-between items-center pb-4 mb-5 border-b-2 border-indigo-100">
                        <h2 class="text-base font-bold gradient-text-primary uppercase tracking-wide">Pesanan Kunjungan</h2>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gradient-to-r from-indigo-50/50 to-purple-50/50 border-l-4 border-indigo-500 hover:translate-x-2 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-bold rounded-full shadow-md">EXTERNAL</span>
                            <span class="text-sm font-medium text-gray-700">Seminar Infrastruktur Berkelanjutan</span>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gradient-to-r from-pink-50/50 to-red-50/50 border-l-4 border-pink-500 hover:translate-x-2 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-pink-400 to-red-500 text-white text-xs font-bold rounded-full shadow-md">INTERNAL</span>
                            <span class="text-sm font-medium text-gray-700">Rapat Perencanaan Anggaran</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="flex justify-between items-center pb-4 mb-5 border-b-2 border-indigo-100">
                        <h2 class="text-base font-bold gradient-text-primary uppercase tracking-wide">Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-5">
                        Membangun infrastruktur jalan yang berkualitas untuk meningkatkan konektivitas dan transportasi masyarakat.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <button class="px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-lg shadow-md hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            +
                        </button>
                        <button class="px-5 py-2.5 bg-indigo-50/80 border-2 border-indigo-200 font-semibold rounded-lg hover:-translate-y-1 hover:shadow-md hover:bg-indigo-100/80 transition-all duration-300">
                            ✅
                        </button>
                        <button class="px-5 py-2.5 bg-indigo-50/80 border-2 border-indigo-200 font-semibold rounded-lg hover:-translate-y-1 hover:shadow-md hover:bg-indigo-100/80 transition-all duration-300">
                            ⊕
                        </button>
                        <button class="px-5 py-2.5 bg-indigo-50/80 border-2 border-indigo-200 font-semibold rounded-lg hover:-translate-y-1 hover:shadow-md hover:bg-indigo-100/80 transition-all duration-300">
                            ⊕
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="space-y-5">
                @php
                    $dataBulanan = [20, 16, 24, 14, 30, 18]; // Contoh data acak untuk bar chart
                    $bulan = ['Jan','Feb','Mar','Apr','Mei','Jun'];
                @endphp

                <div class="chart glass-card rounded-2xl shadow-sm border border-white/20 p-6">
                    <h3 class="text-sm font-bold gradient-text-primary uppercase tracking-wide mb-5">Statistik Kunjungan (6 Bulan)</h3>
                    <div style="display: flex; align-items: flex-end; justify-content: space-around; height: 150px; margin-top: 10px;">
                        @foreach ($dataBulanan as $i => $total)
                            @if ($i < 6)
                            <div class="chart-bar" style="height: {{ $total * 3 }}px; width: 30px; background-color: #1a73e8; border-radius: 4px 4px 0 0; position: relative; transition: height 0.3s ease;" title="Total: {{ $total }}">
                                <div class="chart-label">{{ $bulan[$i] }}</div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="flex justify-between items-center pb-4 mb-5 border-b-2 border-indigo-100">
                        <h2 class="text-sm font-bold gradient-text-primary uppercase tracking-wide">Grafik Kunjungan Tamu</h2>
                    </div>
                    <div class="text-sm font-semibold text-gray-600 mb-3">Pilih Tahun: 2025</div>
                    <div class="bg-gradient-to-br from-white/50 to-indigo-50/30 rounded-xl p-4">
                        <canvas id="GrafikTrenKunjungan" style="max-height: 300px;"></canvas>
                    </div>
                </div>
                
                <div class="glass-card rounded-2xl shadow-sm border border-white/20 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="flex justify-between items-center pb-4 mb-5 border-b-2 border-indigo-100">
                        <h2 class="text-sm font-bold gradient-text-primary uppercase tracking-wide">Kontak Kami</h2>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 p-3 bg-indigo-50/50 rounded-lg hover:translate-x-1 hover:bg-indigo-100/50 transition-all duration-300">
                            <span class="text-xl">📍</span>
                            <span class="text-sm text-gray-700">Jl. Majapahit No. 123, Jakarta Pusat, DKI Jakarta, 10110</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-indigo-50/50 rounded-lg hover:translate-x-1 hover:bg-indigo-100/50 transition-all duration-300">
                            <span class="text-xl">📞</span>
                            <span class="text-sm text-gray-700">(021) 753 0158</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-indigo-50/50 rounded-lg hover:translate-x-1 hover:bg-indigo-100/50 transition-all duration-300">
                            <span class="text-xl">🕒</span>
                            <span class="text-sm text-gray-700">Senin-Jumat: 07.00-16.00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div>
                    <img src="./img/logo.png" alt="Logo Jawa Tengah" >
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah</h3>
                    <p class="text-gray-400">Membangun infrastruktur jalan yang berkualitas untuk meningkatkan konektivitas dan kesejahteraan masyarakat.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Beranda</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Peta Kegiatan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Chart Agenda</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Agenda Kegiatan Eksternal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Agenda Kegiatan Internal</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak Kami</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Jl. Madukoro Blok AA-BB, Tawangmas, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50144</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3"></i>
                            <span> (024) 7613185</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3"></i>
                            <span>Senin-Jumat: 07.00-16.00 WIB</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 pt-6 flex flex-col md:flex-row justify-between items-center">
                <small><p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah. Seluruh hak cipta dilindungi.</p></small>
                <small><p class="text-gray-400 text-sm">Kebijakan Privasi | Syarat & Ketentuan | Peta Situs</p></small>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fungsi untuk mengupdate grafik dengan data acak - TIDAK DIUBAH
        function updateCharts() {
            // Mengambil elemen chart-bar di dalam .chart yang pertama (statistik 6 bulan)
            const statBars = document.querySelectorAll('.chart .chart-bar');
            
            statBars.forEach(bar => {
                // Menghasilkan tinggi acak antara 20 dan 90
                const randomHeight = Math.floor(Math.random() * 70) + 20;
                // Mengubah style height-nya (diasumsikan dalam satuan persen)
                bar.style.height = `${randomHeight}%`;
                // Memperbarui title/tooltip untuk menunjukkan nilai acak yang baru
                const randomValue = Math.floor(randomHeight / 3); // Skala balik sederhana
                bar.setAttribute('title', `Total: ${randomValue}`);
            });
        }
        
        // Update grafik setiap 5 detik untuk efek dinamis - TIDAK DIUBAH
        setInterval(updateCharts, 5000);
        
        // Initialize Chart.js untuk Grafik Kunjungan Tamu (Polar Area Chart)
        const ctx = document.getElementById('GrafikTrenKunjungan');
        if (ctx) {
            const polarChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'Kunjungan Tamu 2025',
                        data: [10, 8, 12, 7, 15, 9, 6, 11, 8, 10, 7, 14],
                        backgroundColor: [
                            'rgba(147, 197, 253, 0.7)', 
                            'rgba(251, 207, 232, 0.7)', 
                            'rgba(253, 186, 116, 0.7)', 
                            'rgba(254, 240, 138, 0.7)', 
                            'rgba(167, 243, 208, 0.7)', 
                            'rgba(196, 181, 253, 0.7)', 
                            'rgba(203, 213, 225, 0.7)', 
                            'rgba(147, 197, 253, 0.7)', 
                            'rgba(251, 207, 232, 0.7)', 
                            'rgba(253, 186, 116, 0.7)', 
                            'rgba(254, 240, 138, 0.7)', 
                            'rgba(167, 243, 208, 0.7)', 
                        ],
                        borderWidth: 2,
                        borderColor: [
                            'rgba(59, 130, 246, 1)',
                            'rgba(236, 72, 153, 1)',
                            'rgba(251, 146, 60, 1)',
                            'rgba(250, 204, 21, 1)',
                            'rgba(52, 211, 153, 1)',
                            'rgba(139, 92, 246, 1)',
                            'rgba(148, 163, 184, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(236, 72, 153, 1)',
                            'rgba(251, 146, 60, 1)',
                            'rgba(250, 204, 21, 1)',
                            'rgba(52, 211, 153, 1)',
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                padding: 15,
                                font: {
                                    size: 11,
                                    weight: '600'
                                },
                                usePointStyle: true,
                                pointStyle: 'rectRounded',
                                generateLabels: function(chart) {
                                    const data = chart.data;
                                    if (data.labels.length && data.datasets.length) {
                                        return data.labels.map((label, i) => {
                                            const dataset = data.datasets[0];
                                            return {
                                                text: label,
                                                fillStyle: dataset.backgroundColor[i],
                                                strokeStyle: dataset.borderColor[i],
                                                lineWidth: 2,
                                                hidden: false,
                                                index: i
                                            };
                                        });
                                    }
                                    return [];
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.95)',
                            titleColor: '#1f2937',
                            bodyColor: '#1f2937',
                            borderColor: '#e5e7eb',
                            borderWidth: 1,
                            padding: 12,
                            displayColors: true,
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed.r + ' kunjungan';
                                }
                            }
                        }
                    },
                    scales: {
                        r: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 2,
                                font: {
                                    size: 10
                                },
                                backdropColor: 'transparent'
                            },
                            grid: {
                                color: 'rgba(148, 163, 184, 0.2)'
                            },
                            pointLabels: {
                                display: false
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>