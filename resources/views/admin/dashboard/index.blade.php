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
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Tamu yang sedang berkunjung</h4>
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
          <i class="far fa-user"></i>
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
          <h4>Riwayat Kedatangan Tamu</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>NIK</th>
                  <th>Instansi</th>
                  <th>No HP</th>
                  <th>Bidang Tujuan</th>
                  <th>Keperluan</th>
                  <th>Foto Selfie</th>
                  <th>Waktu Check-In</th>
                  {{-- <th>Waktu Check-Out</th> --}}
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($list_tamu as $tamu)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $tamu->nama_lengkap }}</td>
                  <td>{{ $tamu->email }}</td>
                  <td>{{ $tamu->nik }}</td>  
                  <td>{{ $tamu->instansi }}</td>
                  <td>{{ $tamu->no_hp }}</td>
                  <td>{{ $tamu->bidang_tujuan }}</td>
                  <td>{{ $tamu->keperluan }}</td>
                  <td>{{ $tamu->foto_selfie }}</td>
                  <td>{{ $tamu->waktu_masuk }}</td>
                </tr>
                @endforeach
                
                {{-- $table->id();
                $table->string('email')->nullable();
                $table->string('nama_lengkap');
                $table->string('nik', 20);
                $table->string('instansi')->nullable();
                $table->string('no_hp', 20)->nullable();
                $table->string('bidang_tujuan')->nullable();
                $table->text('keperluan')->nullable();
                $table->string('foto_selfie')->nullable();
                $table->timestamp('waktu_masuk')->nullable();

                // Foreign key ke tabel master_bidang dan status
                $table->foreignId('id_bidang')->nullable()->constrained('master_bidang')->onDelete('set null');
                $table->foreignId('id_status')->nullable()->constrained('master_status')->onDelete('set null');

                $table->timestamps(); --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
