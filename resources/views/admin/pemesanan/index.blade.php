@extends('admin/layout.main')

@section('title', 'List pemesanan')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List pemesanan</h1>
    <a href="{{ url('/pemesanan/create') }}" class="btn btn-primary">Tambah Data</a>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="mb-0">Filter Tanggal Check-In</h4>
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

                          <div class="col-md-4">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fas fa-filter"></i> Filter
                              </button>

                              <a href="{{ url('/pemesanan') }}" class="btn btn-secondary ml-2">
                                  Reset
                              </a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>

            <table class="table table-hover table-striped w-100" id="table-1">
                <thead class="text-center">
                    <tr>
                        <th style="width:50px;">No</th>
                        <th style="width:160px;">Nama</th>
                        <th style="width:180px;">Email</th>
                        <th style="width:140px;">NIK</th>
                        <th style="width:160px;">Instansi</th>
                        <th style="width:130px;">No HP</th>
                        <th style="width:160px;">Bidang Tujuan</th>
                        <th style="width:200px;">Keperluan</th>
                        <th style="width:150px;">Tanggal</th>
                        <th style="width:120px;">Jam</th>
                        <th style="width:110px;">Status</th>
                        <th style="width:120px;">Aksi</th>
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

                        <td>{{ $pemesanan->bidang->nama_bidang ?? '-' }}</td>

                        <td title="{{ $pemesanan->keperluan }}">
                            {{ \Illuminate\Support\Str::limit($pemesanan->keperluan, 40) }}
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
                                    1 => 'warning', // Menunggu
                                    2 => 'success', // Disetujui
                                    3 => 'danger',  // Ditolak
                                    default => 'secondary'
                                };
                            @endphp

                            <span class="badge badge-{{ $badge }}">
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
                                    <button class="btn btn-sm btn-success" title="Setujui">
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
