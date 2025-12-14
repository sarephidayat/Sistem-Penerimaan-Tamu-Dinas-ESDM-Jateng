@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('content')

{{-- =======================
   STATISTIK DASHBOARD
======================= --}}
<div class="row">

  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
    <div class="stat-card">
      <div class="stat-icon bg-primary">
        <i class="fas fa-user-clock"></i>
      </div>
      <div>
        <span>Sedang Berkunjung</span>
        <h3>{{ $total_tamu_sedang_berkunjung }}</h3>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
    <div class="stat-card">
      <div class="stat-icon bg-danger">
        <i class="fas fa-calendar-day"></i>
      </div>
      <div>
        <span>Tamu Hari Ini</span>
        <h3>{{ $total_tamu_hari_ini }}</h3>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
    <div class="stat-card">
      <div class="stat-icon bg-success">
        <i class="fas fa-calendar-week"></i>
      </div>
      <div>
        <span>Minggu Ini</span>
        <h3>{{ $total_tamu_minggu_ini }}</h3>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
    <div class="stat-card">
      <div class="stat-icon bg-info">
        <i class="fas fa-calendar-alt"></i>
      </div>
      <div>
        <span>Bulan Ini</span>
        <h3>{{ $total_tamu_bulan_ini }}</h3>
      </div>
    </div>
  </div>

</div>

{{-- =======================
   TABEL TAMU HARI INI
======================= --}}
<div class="row">
  <div class="col-12">
    <div class="card clean-card">

      <div class="card-header">
        <h4>Tamu Hari Ini</h4>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-hover w-100">

          <thead>
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
              <th style="width:120px;">Status</th>
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
              <td>{{ \Illuminate\Support\Str::limit($tamu->keperluan, 40) }}</td>

              <td class="text-center">
                <div style="width:120px; height:120px; margin:auto;">
                  <img
                    src="{{ asset('storage/' . $tamu->foto_selfie) }}"
                    style="width:100%; height:100%; object-fit:cover;"
                    class="img-thumbnail"
                  >
                </div>
              </td>



              <td class="text-center">
                @if ($tamu->id_status == 1)
                  <form action="{{ route('checkin.approve', $tamu->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success btn-sm" title="Setujui">
                      <i class="fas fa-check"></i>
                    </button>
                  </form>

                  <form action="{{ route('checkin.reject', $tamu->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger btn-sm" title="Tolak">
                      <i class="fas fa-times"></i>
                    </button>
                  </form>
                @else
                  -
                @endif
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

@endsection
