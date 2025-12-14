@extends('admin/layout.main')

@section('title', 'List Pemesanan')

@section('content')
<section class="section">

    {{-- HEADER --}}
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1 class="mb-0">List Pemesanan</h1>
        <a href="{{ url('/pemesanan/create') }}" class="btn btn-primary btn-icon">
            <i class="fas fa-plus mr-1"></i> Tambah Data
        </a>
    </div>

    <div class="row">
        <div class="col-12">

            {{-- FILTER CARD --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h4 class="mb-0">
                        <i class="fas fa-filter mr-1"></i> Filter Tanggal Kunjungan
                    </h4>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ url('/pemesanan') }}">
                        <div class="form-row align-items-end">
                            <div class="col-md-4">
                                <label>Tanggal Mulai</label>
                                <input type="date"
                                       name="tanggal_mulai"
                                       class="form-control"
                                       value="{{ request('tanggal_mulai') }}">
                            </div>

                            <div class="col-md-4">
                                <label>Tanggal Selesai</label>
                                <input type="date"
                                       name="tanggal_selesai"
                                       class="form-control"
                                       value="{{ request('tanggal_selesai') }}">
                            </div>

                            <div class="col-md-4 mt-2 mt-md-0">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-search"></i> Filter
                                </button>

                                <a href="{{ url('/pemesanan') }}" class="btn btn-secondary">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- TABLE CARD --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover table-striped w-100" id="table-1">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>Instansi</th>
                                    <th>No HP</th>
                                    <th>Bidang Tujuan</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pemesanans as $pemesanan)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>

                                    <td>{{ $pemesanan->nama_lengkap }}</td>
                                    <td>{{ $pemesanan->email ?? '-' }}</td>
                                    <td>{{ $pemesanan->nik }}</td>
                                    <td>{{ $pemesanan->instansi ?? '-' }}</td>
                                    <td>{{ $pemesanan->no_hp ?? '-' }}</td>

                                    <td>
                                        {{ $pemesanan->bidang->nama_bidang ?? '-' }}
                                    </td>

                                    <td title="{{ $pemesanan->keperluan }}">
                                        {{ \Illuminate\Support\Str::limit($pemesanan->keperluan, 45, '...') }}
                                    </td>

                                    <td class="text-center">
                                        {{ $pemesanan->tanggal_kunjungan
                                            ? $pemesanan->tanggal_kunjungan->format('d-m-Y')
                                            : '-' }}
                                    </td>

                                    <td class="text-center">
                                        {{ $pemesanan->jam_kunjungan
                                            ? \Carbon\Carbon::parse($pemesanan->jam_kunjungan)->format('H:i')
                                            : '-' }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="text-center">
                                        @php
                                            $badge = match($pemesanan->id_status) {
                                                1 => 'warning',
                                                2 => 'success',
                                                3 => 'danger',
                                                default => 'secondary'
                                            };
                                        @endphp

                                        <span class="badge badge-{{ $badge }} px-3 py-2">
                                            {{ $pemesanan->status->nama_status ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- AKSI --}}
                                    <td class="text-center">

                                        @if ($pemesanan->id_status == 1)
                                            <form action="{{ route('pemesanan.approve', $pemesanan->id) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-sm btn-success mr-1" title="Setujui">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('pemesanan.reject', $pemesanan->id) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden"
                                                       name="catatan_admin"
                                                       value="Mohon maaf, permohonan belum dapat dipenuhi.">

                                                <button class="btn btn-sm btn-danger" title="Tolak">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif

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
