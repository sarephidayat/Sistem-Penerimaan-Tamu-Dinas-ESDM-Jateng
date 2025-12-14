@extends('admin/layout.main')

@section('title', 'List Checkin')

@section('content')
<section class="section">

    {{-- HEADER --}}
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1 class="mb-0">List Check-In</h1>

    </div>

    <div class="row">
        <div class="col-12">

            {{-- FILTER CARD --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h4 class="mb-0">
                        <i class="fas fa-filter mr-1"></i> Filter Tanggal Check-In
                    </h4>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ url('/checkin') }}">
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

                                <a href="{{ url('/checkin') }}" class="btn btn-secondary">
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
                                    <th>Foto</th>
                                    <th>Waktu Check-In</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($checkins as $tamu)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $tamu->nama_lengkap }}</td>
                                    <td>{{ $tamu->email ?? '-' }}</td>
                                    <td>{{ $tamu->nik }}</td>
                                    <td>{{ $tamu->instansi ?? '-' }}</td>
                                    <td>{{ $tamu->no_hp ?? '-' }}</td>
                                    <td>{{ $tamu->bidang->nama_bidang ?? '-' }}</td>

                                    <td title="{{ $tamu->keperluan }}">
                                        {{ \Illuminate\Support\Str::limit($tamu->keperluan, 50, '...') ?? '-' }}
                                    </td>

                                    <td class="text-center">
                                        @if ($tamu->foto_selfie)
                                            <img src="{{ asset('storage/' . $tamu->foto_selfie) }}"
                                                 width="55"
                                                 class="rounded shadow-sm"
                                                 alt="Foto">
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        {{ $tamu->waktu_masuk
                                            ? \Carbon\Carbon::parse($tamu->waktu_masuk)->format('d-m-Y H:i')
                                            : '-' }}
                                    </td>

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
</section>

{{-- MODAL --}}
@push('modals')
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user mr-1"></i> Detail Tamu
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered mb-0">
                    <tr><th width="30%">Nama</th><td id="d-nama"></td></tr>
                    <tr><th>Email</th><td id="d-email"></td></tr>
                    <tr><th>NIK</th><td id="d-nik"></td></tr>
                    <tr><th>Instansi</th><td id="d-instansi"></td></tr>
                    <tr><th>No HP</th><td id="d-nohp"></td></tr>
                    <tr><th>Bidang Tujuan</th><td id="d-bidang"></td></tr>
                    <tr><th>Keperluan</th><td id="d-keperluan"></td></tr>
                    <tr><th>Waktu Check-In</th><td id="d-masuk"></td></tr>
                    <tr><th>Status</th><td id="d-status"></td></tr>
                    <tr><th>Foto</th><td id="d-foto"></td></tr>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>
@endpush
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
