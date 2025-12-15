<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agenda - Kepala Dinas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<style>
    /* =======================
   TABLE CARD
======================= */
.table-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    overflow: hidden;
    margin-top: 30px;
    margin-bottom: 40px;
}

/* HEADER */
.table-card-header {
    padding: 18px 24px;
    background: linear-gradient(135deg, #1a56a7, #3b82f6);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.table-card-header h4 {
    margin: 0;
    color: #fff;
    font-weight: 600;
}

/* BODY */
.table-card-body {
    padding: 20px;
}



/* =======================
   TABLE STYLE
======================= */
.custom-table {
    border-collapse: separate;
    border-spacing: 0;
}

.custom-table thead th {
    background: #f1f5f9;
    font-weight: 600;
    color: #1f2937;
    border-bottom: 2px solid #e5e7eb;
    white-space: nowrap;
    vertical-align: middle;
}

.custom-table tbody td {
    vertical-align: middle;
    font-size: 14px;
}

.custom-table tbody tr:hover {
    background-color: #f9fafb;
}

/* =======================
   FOTO TAMU
======================= */
.foto-wrapper {
    width: 110px;
    height: 110px;
    margin: auto;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.foto-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

</style>

</head>
<body>
<!-- Navbar -->
<div class="navbar">
    <div class="navbar-logo" style="margin-left: 50px">
        <img src="{{asset('storage/img/logo-jateng.jpg')}}" alt="Logo DPU" style="width: 50px; height: 50px;margin-left: 20px;">
        <div >
            <h1 style="color: #1a56a7; font-weight: 600; font-size: 18;">Dinas ESDM Jawa Tengah</h1>
            <p></p>
        </div>
    </div>
    <div style="display: flex; align-items: center; gap: 10px; margin-right: 200px;">
        <nav class="navbar-menu" style="display: flex; align-items: center; gap: 10px;">
            <a href="{{url('/')}}" class="nav-link active"> Beranda</a>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <h1 class="dashboard-title" style="font-size: 30px"><b>DASHBOARD KUNJUNGAN TAMU</b></h1>
    <!-- Statistik -->
    <div class="stats-container">
        <div class="stat-card total">
            <div class="stat-value">{{ $total_tamu_hari_ini }}</div>
            <div class="stat-label">TOTAL Tamu Hari Ini</div>

        </div>
        <div class="stat-card hadir">
            <div class="stat-value">{{ $total_tamu_bulan_ini }}</div>
            <div class="stat-label">Total Tamu Bulan Ini</div>
        </div>
        <div class="stat-card diwakilkan">
            <div class="stat-value">{{ $total_tamu_minggu_ini }}</div>
            <div class="stat-label">Total Tamu Minggu Ini</div>
        </div>
    </div>


    {{-- ================================================================================================= --}}
    <div class="row">
    <div class="col-12">

        <div class="table-card">

        <!-- HEADER -->
        <div class="table-card-header">
            <h4>Daftar Tamu Hari Ini</h4>
        </div>

        <!-- BODY -->
        <div class="table-card-body">
            <div class="table-responsive">

            <table class="table custom-table w-100">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th style="width:160px;">Nama</th>
                    {{-- <th style="width:180px;">Email</th> --}}
                    {{-- <th style="width:140px;">NIK</th> --}}
                    <th style="width:160px;">Instansi</th>
                    {{-- <th style="width:130px;">No HP</th> --}}
                    <th style="width:160px;">Bidang</th>
                    <th style="width:220px;">Keperluan</th>
                    <th style="width:150px;" class="text-center">Foto</th>
                    <th style="width:170px;">Check-In</th>
                    <th style="width:170px;">Check-Out</th>
                    <th style="width:120px;" class="text-center">Status</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($tamu_hari_ini as $no => $tamu)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $tamu->nama_lengkap }}</td>
                    {{-- <td>{{ $tamu->email ?? '-' }}</td> --}}
                    {{-- <td>{{ $tamu->nik }}</td> --}}
                    <td>{{ $tamu->instansi ?? '-' }}</td>
                    {{-- <td>{{ $tamu->no_hp ?? '-' }}</td> --}}
                    <td>{{ $tamu->bidang->nama_bidang ?? '-' }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($tamu->keperluan, 40) }}</td>

                    <!-- FOTO -->
                    <td class="text-center">
                    @if ($tamu->foto_selfie)
                        <div class="foto-wrapper">
                        <img src="{{ asset('storage/' . $tamu->foto_selfie) }}" alt="Foto Tamu">
                        </div>
                    @else
                        -
                    @endif
                    </td>

                    <!-- CHECK-IN -->
                    <td>
                    {{ \Carbon\Carbon::parse($tamu->waktu_masuk)->format('d-m-Y H:i') }}
                    </td>

                    <!-- CHECK-OUT -->
                    <td>
                    {{ $tamu->checkout
                        ? \Carbon\Carbon::parse($tamu->checkout->waktu_keluar)->format('d-m-Y H:i')
                        : '-' }}
                    </td>

                    <!-- STATUS -->
                    <td class="text-center">
                    @php
                        $badge = match($tamu->id_status) {
                        1 => 'warning',
                        2 => 'info',
                        3 => 'danger',
                        4 => 'success',
                        default => 'dark'
                        };
                    @endphp
                    <span class="badge badge-{{ $badge }} px-3 py-2">
                        {{ $tamu->status->nama_status ?? '-' }}
                    </span>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            </div>
        </div>

        </div>

    </div>
    </div>

    <!-- ================= GRAFIK ================= -->
    <!-- ================= WRAPPER GRAFIK ================= -->
<div class="chart-wrapper-card mt-5">
    <!-- HEADER -->
    <div class="chart-wrapper-header mb-4">
        <h4 class="mb-0">Statistik Kunjungan</h4>
    </div>
    <div class="row"
     style="
        background:#ffffff;
        border-radius:16px;
        padding:20px;
        box-shadow:0 12px 30px rgba(0,0,0,0.08);
     ">

    {{-- ================= MINGGUAN ================= --}}
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-light">
                <h6 class="mb-0">Tren Kunjungan Mingguan</h6>
            </div>
            <div class="card-body">
                <canvas id="chartWeek" height="400" width="600"></canvas>
            </div>
        </div>
    </div>

    {{-- ================= BULANAN ================= --}}
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-light">
                <h6 class="mb-0">Tren Kunjungan Bulanan</h6>
            </div>
            <div class="card-body">
                <canvas id="chartMonth" height="400" width="600"></canvas>
            </div>
        </div>
    </div>

    {{-- ================= BIDANG ================= --}}
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-light">
                <h6 class="mb-0">Bidang Paling Banyak Dikunjungi</h6>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <canvas id="chartBidang" height="400" width="600"></canvas>
            </div>
        </div>
    </div>

    {{-- ================= JAM ================= --}}
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-light">
                <h6 class="mb-0">Waktu Kunjungan Paling Ramai</h6>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <canvas id="chartHour" height="400" width="600"></canvas>
            </div>
        </div>
    </div>

</div>
</div>




</div>

<!-- Footer -->

    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div>
                    <img src="./img/logo.png" alt="Logo Jawa Tengah" >
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Dinas ESDM Jawa Tengah</h3>
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
                        <li><a href="#" class="text-gray-400 hover:text-white">Rekapan Tamu</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Chart Agenda</a></li>
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
                <small><p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 Dinas ESDM Jawa Tengah. Seluruh hak cipta dilindungi.</p></small>
                <small><p>Kebijakan Privasi Syarat & Ketentuan Peta Situs</p></small>
            </div>
        </div>
    </footer>

    <script src="{{ asset('modules/chart.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- ================= CHART SCRIPT ================= --}}
@section('scripts')
<script>
new Chart(chartWeek, {
    type: 'line',
    data: {
        labels: @json($weekLabels),
        datasets: [{
            label: 'Kunjungan Mingguan',
            data: @json($weekData),
            borderColor: '#6777ef',
            tension: .4
        }]
    },
    options: { responsive: true, scales: { y: { beginAtZero: true } } }
});

new Chart(chartMonth, {
    type: 'bar',
    data: {
        labels: @json($monthLabels),
        datasets: [{
            label: 'Kunjungan Bulanan',
            data: @json($monthData),
            backgroundColor: '#47c363'
        }]
    },
    options: { responsive: true, scales: { y: { beginAtZero: true } } }
});

new Chart(chartBidang, {
    type: 'polarArea',
    data: {
        labels: @json($bidangLabels),
        datasets: [{
            data: @json($bidangData),
            backgroundColor: ['#6777ef','#ffa426','#63ed7a','#fc544b','#3abaf4']
        }]
    },
    options: { responsive: true, plugins: { legend: { position: 'right' } } }
});

new Chart(chartHour, {
    type: 'radar',
    data: {
        labels: @json($hourLabels),
        datasets: [{
            label: 'Jam Ramai',
            data: @json($hourData),
            backgroundColor: 'rgba(103,119,239,.2)',
            borderColor: '#6777ef'
        }]
    },
    options: { scales: { r: { beginAtZero: true } } }
});
</script>
</body>
</html>
