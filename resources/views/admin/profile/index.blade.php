@extends('admin/layout.main')

@section('title', 'List profile')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List profile</h1>
    <a href="{{ url('/profile/create') }}" class="btn btn-primary">Tambah Data</a>
  </div>

  <div class="row">
        {{-- ================= PROFILE CARD ================= --}}
        <div class="col-lg-6 col-md-12 col-12">
            <div class="card">
                <div class="card-header justify-content-center">
                    <h4 style="color:#5c3d2e;">Profile</h4>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                             alt="Admin Avatar"
                             class="rounded-circle"
                             width="100"
                             height="100">

                        <h5 class="mt-3 mb-1">
                            {{ session('login')->nama ?? 'Administrator' }}
                        </h5>
                        <p class="text-muted">Super Admin</p>
                    </div>

                    <div class="row">
                        <div class="col-sm-4"><strong>Nama Lengkap</strong></div>
                        <div class="col-sm-8 text-muted">
                            Admin Dinas ESDM Jawa Tengah
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-4"><strong>Username</strong></div>
                        <div class="col-sm-8 text-muted">
                            {{ session('login')->username ?? '-' }}
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-4"><strong>Role</strong></div>
                        <div class="col-sm-8">
                            <span class="badge badge-danger">Admin</span>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-4"><strong>Last Login</strong></div>
                        <div class="col-sm-8 text-muted">
                            {{ now()->format('d F Y, H:i') }}
                        </div>
                    </div>
                    <hr>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Ganti Password
                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- ================= PETUNJUK ================= --}}
        <div class="col-lg-6 col-md-12 col-12">
            <div class="card">
                <div class="card-header justify-content-center">
                    <h4 style="color:#5c3d2e;">Petunjuk Penggunaan</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted mb-2">
                        Berikut langkah-langkah untuk mengubah informasi profil Anda:
                    </p>

                    <ol class="pl-3" style="line-height:1.8;">
                        <li>Klik tombol <strong>Edit Profile</strong></li>
                        <li>Ubah data yang ingin diperbarui (nama, email, atau foto).</li>
                        <li>Tekan tombol <strong>Simpan</strong>.</li>
                        <li>Logout dan login kembali jika perubahan belum terlihat.</li>
                    </ol>

                    <div class="text-right mt-4">
                        <a href="#" class="btn btn-primary disabled">
                            <i class="fas fa-edit"></i> Ganti Password
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
