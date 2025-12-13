@extends('admin/layout.main')

@section('title', 'List statistik')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List statistik</h1>
    <a href="{{ url('/statistik/create') }}" class="btn btn-primary">Tambah Data</a>
  </div>

  

  <div class="row">
    <!-- CHART MINGGUAN -->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Tren Kunjungan Mingguan</h4>
            </div>
            <div class="card-body">
                <canvas id="chartWeek" height="120"></canvas>
            </div>
        </div>
    </div>

    <!-- CHART BULANAN -->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Tren Kunjungan Bulanan</h4>
            </div>
            <div class="card-body">
                <canvas id="chartMonth" height="120"></canvas>
            </div>
        </div>
    </div>

    <!-- CHART BIDANG -->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Bidang Paling Banyak Dikunjungi</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <canvas id="chartBidang" height="180"></canvas>
            </div>
        </div>
    </div>

    <!-- CHART JAM RAMAI -->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Waktu Kunjungan Paling Ramai</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <canvas id="chartHour" height="180"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="row align-items-center mb-3">
    <div class="col-md-6 col-sm-12">
    </div>

    <div class="col-md-6 col-sm-12 text-md-right">
        <a href="{{ route('statistik.export.pdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tamu Hari Ini</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <th width="70px">No</th>
                        <th width="160px">Nama</th>
                        <th width="180px">Email</th>
                        <th width="140px">NIK</th>
                        <th width="160px">Instansi</th>
                        <th width="130px">No HP</th>
                        <th width="160px">Bidang Tujuan</th>
                        <th width="200px">Keperluan</th>
                        <th width="100px">Foto</th>
                        <th width="170px">Waktu Check-In</th>
                        <th width="170px">Waktu Check-Out</th>
                        <th width="130px">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tamu_hari_ini as $no => $tamu)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $tamu->nama_lengkap }}</td>
                        <td>{{ $tamu->email ?? '-' }}</td>
                        <td>{{ $tamu->nik }}</td>
                        <td>{{ $tamu->instansi ?? '-' }}</td>
                        <td>{{ $tamu->no_hp ?? '-' }}</td>

                        <td>{{ $tamu->bidang->nama_bidang ?? '-' }}</td>

                        <td title="{{ $tamu->keperluan }}">
                            {{ \Illuminate\Support\Str::limit($tamu->keperluan, 40) }}
                        </td>

                        <td class="text-center">
                            @if ($tamu->foto_selfie)
                                <img src="{{ asset('storage/' . $tamu->foto_selfie) }}"
                                    width="60"
                                    class="img-thumbnail">
                            @else
                                -
                            @endif
                        </td>
                        {{-- Waktu Masuk --}}
                        <td>
                            {{ \Carbon\Carbon::parse($tamu->waktu_masuk)->format('d-m-Y H:i') }}
                        </td>

                        {{-- Waktu Keluar --}}
                        <td>
                            @if ($tamu->checkout)
                                {{ \Carbon\Carbon::parse($tamu->checkout->waktu_keluar)->format('d-m-Y H:i') }}
                            @else
                                -
                            @endif
                        </td>

                        {{-- Status Dinamis --}}
                        <td>
                            <span class="badge 
                                @if ($tamu->status->nama_status == 'Menunggu')
                                    badge-warning
                                @elseif ($tamu->status->nama_status == 'Disetujui')
                                    badge-primary
                                @elseif ($tamu->status->nama_status == 'Ditolak')
                                    badge-danger
                                @elseif ($tamu->status->nama_status == 'Check-out')
                                    badge-success
                                @else
                                    badge-secondary
                                @endif
                            ">
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

@section('scripts')
<script>
/* =======================
   1. MINGGUAN (LINE)
======================= */
new Chart(document.getElementById('chartWeek'), {
    type: 'line',
    data: {
        labels: @json($weekLabels),
        datasets: [{
            label: 'Kunjungan Mingguan',
            data: @json($weekData),
            borderColor: '#6777ef',
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 25,              // 🔥 BATAS MAKSIMAL
                ticks: {
                    stepSize: 5,      // opsional: 0,5,10,15,20,25
                    precision: 0
                }
            }
        }
    }
});

/* =======================
   2. BULANAN (BAR)
======================= */
new Chart(document.getElementById('chartMonth'), {
    type: 'bar',
    data: {
        labels: @json($monthLabels),
        datasets: [{
            label: 'Kunjungan Bulanan',
            data: @json($monthData),
            backgroundColor: '#47c363'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 25,              // 🔥 BATAS MAKSIMAL
                ticks: {
                    stepSize: 5,      // opsional: 0,5,10,15,20,25
                    precision: 0
                }
            }
        }
    }
});


/* =======================
   3. BIDANG (POLAR)
======================= */
new Chart(document.getElementById('chartBidang'), {
    type: 'polarArea',
    data: {
        labels: @json($bidangLabels),
        datasets: [{
            data: @json($bidangData),
            backgroundColor: [
                '#6777ef',
                '#ffa426',
                '#63ed7a',
                '#fc544b',
                '#3abaf4',
                '#e83e8c',
                '#20c997'
            ]
        }]
    },
    options: {
        responsive: true,
        scales: {
            r: {
                beginAtZero: true,
                max: 10,              // 🔥 BATAS MAKSIMAL
                ticks: {
                    stepSize: 2,     
                    precision: 0
                }
            }
        },
        plugins: {
            legend: {
                position: 'right'
            }
        }
    }
});


/* =======================
   4. JAM RAMAI (RADAR)
======================= */
new Chart(document.getElementById('chartHour'), {
    type: 'radar',
    data: {
        labels: @json($hourLabels),
        datasets: [{
            label: 'Jam Paling Ramai',
            data: @json($hourData),
            backgroundColor: 'rgba(103,119,239,0.2)',
            borderColor: '#6777ef',
            pointBackgroundColor: '#6777ef'
        }]
    },
    options: {
        scales: {
            r: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});

</script>
@endsection



@section('scripts')
@if(session('success'))
<script>
  iziToast.success({
    title: 'Sukses',
    message: `{{ session('success') }}`,
    position: 'topCenter',
    timeout: 5000
  });
</script>
@endif

@if(session('error'))
<script>
  iziToast.error({
    title: 'Gagal',
    message: `{{ session('error') }}`,
    position: 'topCenter',
    timeout: 5000
  });
</script>
@endif



<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
