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
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>NIK</th>
              <th>Instansi</th>
              <th>No HP</th>
              <th>Bidang</th>
              <th>Keperluan</th>
              <th>Foto</th>
              <th class="text-center">Aksi</th>
              <th>Check-In</th>
              <th>Check-Out</th>
              <th>Status</th>
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

              <td>
                @if ($tamu->foto_selfie)
                  <img
                    src="{{ asset('storage/' . $tamu->foto_selfie) }}"
                    class="img-thumbnail"
                    width="90"
                  >
                @else
                  -
                @endif
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

              <td>
                <span class="badge badge-{{ strtolower($tamu->status->nama_status) }}">
                  {{ $tamu->status->nama_status }}
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
