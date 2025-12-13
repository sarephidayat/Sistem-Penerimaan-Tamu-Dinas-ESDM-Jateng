@extends('admin/layout.main')

@section('title', 'List Checkin')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Checkin</h1>
    <a href="{{ url('/checkin/create') }}" class="btn btn-primary">Tambah Data</a>
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

                          <div class="col-md-4">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fas fa-filter"></i> Filter
                              </button>

                              <a href="{{ url('/checkin') }}" class="btn btn-secondary ml-2">
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
                        <th style="width:100px;">Foto</th>
                        <th style="width:170px;">Waktu Check-In</th>
                        <th style="width:110px;">Status</th>
                        <th style="width:80px;">Detail</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($checkins as $tamu)
                    <tr>
                        {{-- No --}}
                        <td class="text-center">{{ $loop->iteration }}</td>

                        <td>{{ $tamu->nama_lengkap }}</td>
                        <td>{{ $tamu->email ?? '-' }}</td>
                        <td>{{ $tamu->nik }}</td>
                        <td>{{ $tamu->instansi ?? '-' }}</td>
                        <td>{{ $tamu->no_hp ?? '-' }}</td>

                        {{-- Bidang --}}
                        <td>{{ $tamu->bidang->nama_bidang ?? '-' }}</td>

                        {{-- Keperluan (dipotong) --}}
                        <td title="{{ $tamu->keperluan }}">
                            {{ \Illuminate\Support\Str::limit($tamu->keperluan, 50, '...') ?? '-' }}
                        </td>

                        {{-- Foto --}}
                        <td class="text-center">
                            @if ($tamu->foto_selfie)
                                <img src="{{ asset('storage/' . $tamu->foto_selfie) }}"
                                    width="60"
                                    class="img-thumbnail"
                                    alt="Foto">
                            @else
                                -
                            @endif
                        </td>

                        {{-- Waktu --}}
                        <td class="text-center">
                            {{ $tamu->waktu_masuk
                                ? \Carbon\Carbon::parse($tamu->waktu_masuk)->format('d-m-Y H:i')
                                : '-' }}
                        </td>

                        {{-- Status (warna konsisten) --}}
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

                            <span class="badge badge-{{ $badge }}">
                                {{ $tamu->status->nama_status ?? '-' }}
                            </span>
                        </td>
                        {{-- Detail --}}
                        <td class="text-center">
                            <button class="btn btn-sm btn-info btn-detail"
                                data-nama="{{ $tamu->nama_lengkap }}"
                                data-email="{{ $tamu->email ?? '-' }}"
                                data-nik="{{ $tamu->nik }}"
                                data-instansi="{{ $tamu->instansi ?? '-' }}"
                                data-nohp="{{ $tamu->no_hp ?? '-' }}"
                                data-bidang="{{ $tamu->bidang->nama_bidang ?? '-' }}"
                                data-keperluan="{{ $tamu->keperluan ?? '-' }}"
                                data-masuk="{{ \Carbon\Carbon::parse($tamu->waktu_masuk)->format('d-m-Y H:i') }}"
                                data-status="{{ $tamu->status->nama_status ?? '-' }}"
                                data-foto ="{{ $tamu->foto_selfie ? asset('storage/' . $tamu->foto_selfie) : '-' }}" 
                                title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>

                        

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @push('modals')
            <div class="modal fade" id="detailModal" tabindex="-1">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                      <div class="modal-header">
                          <h5 class="modal-title">Detail Tamu</h5>
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
