@extends('admin/layout.main')

@section('title', 'Statistik Kunjungan')

@section('content')
<section class="section">

    {{-- HEADER --}}
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Statistik Kunjungan</h1>
        <a href="{{ route('statistik.export.pdf') }}" class="btn btn-danger btn-icon">
            <i class="fas fa-file-pdf mr-1"></i> Export PDF
        </a>
    </div>

    {{-- CHART SECTION --}}
    <div class="row">

        {{-- MINGGUAN --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Tren Kunjungan Mingguan</h4>
                </div>
                <div class="card-body">
                    <canvas id="chartWeek" height="140"></canvas>
                </div>
            </div>
        </div>

        {{-- BULANAN --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Tren Kunjungan Bulanan</h4>
                </div>
                <div class="card-body">
                    <canvas id="chartMonth" height="140"></canvas>
                </div>
            </div>
        </div>

        {{-- BIDANG --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Bidang Paling Banyak Dikunjungi</h4>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <canvas id="chartBidang" height="200"></canvas>
                </div>
            </div>
        </div>

        {{-- JAM --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Waktu Kunjungan Paling Ramai</h4>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <canvas id="chartHour" height="200"></canvas>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Tamu Hari Ini</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped w-100" id="table-1">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th style="width:50px;">No</th>
                                    <th style="width:160px;">Nama</th>
                                    <th style="width:180px;">Email</th>
                                    <th style="width:140px;">NIK</th>
                                    <th style="width:160px;">Instansi</th>
                                    <th style="width:130px;">No HP</th>
                                    <th style="width:160px;">Bidang</th>
                                    <th style="width:220px;">Keperluan</th>
                                    <th style="width:200px;">Foto</th>
                                    <th style="width:110px;" class="text-center">Aksi</th>
                                    <th style="width:170px;">Check-In</th>
                                    <th style="width:170px;">Check-Out</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tamu_hari_ini as $no => $tamu)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{ $tamu->nama_lengkap }}</td>
                                    <td>{{ $tamu->email ?? '-' }}</td>
                                    <td>{{ $tamu->nik }}</td>
                                    <td>{{ $tamu->instansi ?? '-' }}</td>
                                    <td>{{ $tamu->no_hp ?? '-' }}</td>
                                    <td>{{ $tamu->bidang->nama_bidang ?? '-' }}</td>

                                    <td title="{{ $tamu->keperluan }}">
                                        {{ \Illuminate\Support\Str::limit($tamu->keperluan, 45) }}
                                    </td>

                                    <td class="text-center">
                                        <div style="width:120px; height:120px; margin:auto;">
                                        <img
                                            src="{{ asset('storage/' . $tamu->foto_selfie) }}"
                                            style="width:100%; height:100%; object-fit:cover;"
                                            class="img-thumbnail"
                                        >
                                        </div>
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($tamu->waktu_masuk)->format('d-m-Y H:i') }}
                                    </td>

                                    <td>
                                        {{ $tamu->checkout
                                            ? \Carbon\Carbon::parse($tamu->checkout->waktu_keluar)->format('d-m-Y H:i')
                                            : '-' }}
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $badge = match($tamu->status->nama_status ?? '') {
                                                'Menunggu' => 'warning',
                                                'Disetujui' => 'primary',
                                                'Ditolak' => 'danger',
                                                'Check-out' => 'success',
                                                default => 'secondary'
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

</section>
@endsection

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

@if(session('success'))
<script>
iziToast.success({ title: 'Sukses', message: "{{ session('success') }}", position: 'topCenter' });
</script>
@endif

@if(session('error'))
<script>
iziToast.error({ title: 'Gagal', message: "{{ session('error') }}", position: 'topCenter' });
</script>
@endif

<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
