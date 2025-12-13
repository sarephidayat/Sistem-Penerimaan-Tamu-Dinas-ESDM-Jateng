@extends('admin/layout.main')

@section('title', 'Dashboard')

@section('content')
<section class="section">
  <div class="section-header">

    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <!-- Total Dosen -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Sedang berkunjung</h4>
          </div>
          <div class="card-body">
            {{ $total_tamu_sedang_berkunjung }}
          </div>
        </div>
      </div>
    </div>

    <!-- Total User -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Tamu hari ini</h4>
          </div>
          <div class="card-body">
            {{ $total_tamu_hari_ini }}
          </div>
        </div>
      </div>
    </div>

    <!-- Total Mata Kuliah -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Tamu minggu ini </h4>
          </div>
          <div class="card-body">
            {{ $total_tamu_minggu_ini }}
          </div>
        </div>
      </div>
    </div>


    {{-- Total tamu bulan ini
     --}}
     <!-- Total Mata Kuliah -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Tamu bulan ini </h4>
          </div>
          <div class="card-body">
            {{ $total_tamu_bulan_ini }}
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Bagian list tamu --}}
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
                        <th width="200px">Foto</th>
                        <th width="120px">Aksi</th>
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
                                    width="150"
                                    height="100"
                                    class="img-thumbnail"
                                    alt="Foto">
                            @else
                                -
                            @endif
                        </td>

                        <td class="text-center">
                            @if ($tamu->id_status == 1)
                                {{-- Setujui --}}
                                <form action="{{ route('checkin.approve', $tamu->id) }}"
                                      method="POST"
                                      class="d-inline form-approve">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            class="btn btn-sm btn-success"
                                            title="Setujui">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>

                                {{-- Tolak --}}
                                <form action="{{ route('checkin.reject', $tamu->id) }}"
                                      method="POST"
                                      class="d-inline form-reject">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Tolak">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">-</span>
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
