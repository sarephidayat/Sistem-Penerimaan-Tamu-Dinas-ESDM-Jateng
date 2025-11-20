<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kunjungan Tamu Dinas ESDM</title>
    <style>
        /* Reset dan variabel */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary: #1a73e8;
            --secondary: #34a853;
            --light-gray: #f5f5f5;
            --dark-gray: #5f6368;
            --border-color: #e0e0e0;
            --text-color: #202124;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 20px;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo h1 {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        /* Statistik utama */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: var(--dark-gray);
            font-size: 14px;
        }
        
        /* Grid utama */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        
        .main-content {
            display: grid;
            grid-template-rows: auto auto auto;
            gap: 20px;
        }
        
        .sidebar {
            display: grid;
            grid-template-rows: auto auto auto;
            gap: 20px;
        }
        
        /* Kartu konten */
        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .card-title {
            font-size: 18px;
            font-weight: 600;
        }
        
        .card-content {
            min-height: 150px;
        }
        
        /* Agenda hari ini */
        .agenda-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .agenda-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: var(--light-gray);
        }
        
        .agenda-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-external {
            background-color: #e8f0fe;
            color: var(--primary);
        }
        
        .badge-internal {
            background-color: #e6f4ea;
            color: var(--secondary);
        }
        
        /* Grafik */
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
            background-color: var(--primary);
            border-radius: 4px 4px 0 0;
            position: relative;
        }
        
        .chart-label {
            position: absolute;
            bottom: -25px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: var(--dark-gray);
        }
        
        .chart-title {
            font-size: 14px;
            margin-bottom: 10px;
            color: var(--dark-gray);
        }
        
        /* Footer */
        footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--dark-gray);
            text-align: center;
        }
        
        /* Responsif */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1>Dashboard Kunjungan Tamu Dinas ESDM</h1>
            </div>
            <div class="user-info">
                <div class="user-avatar">KD</div>
                <span>Kepala Dinas</span>
            </div>
        </header>
        
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">32</div>
                <div class="stat-label">TOTAL TAMU DI KANTOR</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">29</div>
                <div class="stat-label">TOTAL TAMU HARI INI</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">3</div>
                <div class="stat-label">TOTAL TAMU BULAN INI</div>
            </div>
        </div>
        
        <div class="dashboard-grid">
            <div class="main-content">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">KUNJUNGAN HARI INI</div>
                    </div>
                    <div class="card-content">
                        <div class="agenda-list">
                            <div class="agenda-item">
                                <span class="agenda-badge badge-external">External</span>
                                <span>Rapat Koordinasi Pembangunan Jalan</span>
                            </div>
                            <div class="agenda-item">
                                <span class="agenda-badge badge-internal">Internal</span>
                                <span>Evaluasi Kinerja Triwulan</span>
                            </div>
                            <div class="agenda-item">
                                <span class="agenda-badge badge-external">External</span>
                                <span>Kunjungan Kerja ke Proyek Jembatan</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">PESANAN KUNJUNGAN</div>
                    </div>
                    <div class="card-content">
                        <div class="agenda-list">
                            <div class="agenda-item">
                                <span class="agenda-badge badge-external">External</span>
                                <span>Seminar Infrastruktur Berkelanjutan</span>
                            </div>
                            <div class="agenda-item">
                                <span class="agenda-badge badge-internal">Internal</span>
                                <span>Rapat Perencanaan Anggaran</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Dinas PU Bina Marga dan Cipta Karya</div>
                    </div>
                    <div class="card-content">
                        <p>Membangun infrastruktur jalan yang berkualitas untuk meningkatkan konektivitas dan transportasi masyarakat.</p>
                        <div style="margin-top: 15px; display: flex; gap: 10px;">
                            <button style="background: #1a73e8; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">+</button>
                            <button style="background: #f1f3f4; border: 1px solid #dadce0; padding: 8px 12px; border-radius: 4px; cursor: pointer;">✅</button>
                            <button style="background: #f1f3f4; border: 1px solid #dadce0; padding: 8px 12px; border-radius: 4px; cursor: pointer;">⊕</button>
                            <button style="background: #f1f3f4; border: 1px solid #dadce0; padding: 8px 12px; border-radius: 4px; cursor: pointer;">⊕</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sidebar">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">GRAFIK TREN KUNJUNGAN TAMU</div>
                    </div>
                    <div class="card-content">
                        <div class="chart-title">Pilih Tahun: 2025</div>
                        <div class="chart-container">
                            <div class="chart">
                                <div class="chart-bar" style="height: 70%;">
                                    <div class="chart-label">Jan</div>
                                </div>
                                <div class="chart-bar" style="height: 50%;">
                                    <div class="chart-label">Feb</div>
                                </div>
                                <div class="chart-bar" style="height: 80%;">
                                    <div class="chart-label">Mar</div>
                                </div>
                                <div class="chart-bar" style="height: 60%;">
                                    <div class="chart-label">Apr</div>
                                </div>
                                <div class="chart-bar" style="height: 90%;">
                                    <div class="chart-label">Mei</div>
                                </div>
                                <div class="chart-bar" style="height: 40%;">
                                    <div class="chart-label">Jun</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">GRAFIK KUNJUNGAN TAMU</div>
                    </div>
                    <div class="card-content">
                        <div class="chart-title">Pilih Tahun: 2025</div>
                        <div>
                            <canvas id="GrafikTrenKunjungan"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Kontak Kami</div>
                    </div>
                    <div class="card-content">
                        <p>Jl. Majapahit No. 123, Jakarta Pusat, DKI Jakarta, 10110</p>
                        <p style="margin-top: 10px;">📞 (021) 753 0158</p>
                        <p style="margin-top: 10px;">🕒 Senin-Jumat: 07.00-16.00 WIB</p>
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <p>© 2025 Dinas PU Bina Marga dan Cipta Karya - dikembangkan oleh alibutung</p>
        </footer>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset("js/chart.js") }}"></script>

    <script>
        // Fungsi untuk mengupdate grafik dengan data acak
        function updateCharts() {
            const externalBars = document.querySelectorAll('.chart:first-child .chart-bar');
            const internalBars = document.querySelectorAll('.chart:last-child .chart-bar');
            
            externalBars.forEach(bar => {
                const randomHeight = Math.floor(Math.random() * 70) + 20;
                bar.style.height = `${randomHeight}%`;
            });
            
            internalBars.forEach(bar => {
                const randomHeight = Math.floor(Math.random() * 50) + 10;
                bar.style.height = `${randomHeight}%`;
            });
        }
        
        // Update grafik setiap 5 detik untuk efek dinamis
        setInterval(updateCharts, 5000);
    </script>
</body>
</html>