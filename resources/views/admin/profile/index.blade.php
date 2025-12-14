@extends('admin/layout.main')

@section('title', 'Profile')

@section('content')
<section class="section">

    {{-- ================= HEADER ================= --}}
    <div class="section-header">
        <h1>Profile</h1>
        <a href="{{ url('/profile/create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Tambah Data
        </a>
    </div>

    <div class="row">

        {{-- ================= PROFILE CARD ================= --}}
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="clean-card h-100">
                <div class="card-body text-center">

                    {{-- AVATAR + UPLOAD --}}
                    <div class="profile-avatar mb-3 position-relative">

                        <img
                            src="{{ session('login')->photo
                                    ? asset('storage/profile/' . session('login')->photo)
                                    : asset('img/avatar/avatar-1.jpeg') }}"
                            alt="Avatar"
                            id="preview-avatar">

                        {{-- BUTTON CAMERA --}}
                        <label for="photo"
                               class="btn btn-primary btn-sm position-absolute"
                               style="bottom:12px; right:12px; border-radius:50%;">
                            <i class="fas fa-camera"></i>
                        </label>

                    </div>

                    {{-- FORM UPLOAD (AUTO SUBMIT) --}}
                    <form action="{{ route('profile.upload') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="file"
                               name="photo"
                               id="photo"
                               class="d-none"
                               accept="image/*"
                               onchange="previewImage(this); this.form.submit();">
                    </form>

                    <h5 class="mb-0 font-weight-bold mt-3">
                        {{ session('login')->nama ?? 'Administrator' }}
                    </h5>

                    <small class="text-muted d-block mb-4">
                        Super Admin
                    </small>

                    <div class="profile-info text-left">

                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user text-primary mr-3"></i>
                            <div>
                                <small class="text-muted">Username</small>
                                <div class="font-weight-semibold">
                                    {{ session('login')->username ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user-shield text-danger mr-3"></i>
                            <div>
                                <small class="text-muted">Role</small>
                                <div>
                                    <span class="badge badge-danger">Admin</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock text-info mr-3"></i>
                            <div>
                                <small class="text-muted">Last Login</small>
                                <div class="text-muted">
                                    {{ now()->format('d F Y, H:i') }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4">
                        <a href="#" class="btn btn-primary btn-block">
                            <i class="fas fa-key mr-1"></i> Ganti Password
                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- ================= PETUNJUK ================= --}}
        <div class="col-lg-8 col-md-12 mb-4">
            <div class="clean-card h-100">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="fas fa-info-circle mr-1"></i> Petunjuk Penggunaan
                    </h4>
                </div>

                <div class="card-body">

                    <p class="text-muted mb-4">
                        Berikut panduan singkat untuk mengelola data profil Anda dengan benar:
                    </p>

                    <ul class="list-unstyled" style="line-height:2;">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success mr-2"></i>
                            Klik menu <strong>Edit Profile</strong>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success mr-2"></i>
                            Perbarui data yang diperlukan
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success mr-2"></i>
                            Klik tombol <strong>Simpan</strong>
                        </li>
                        <li>
                            <i class="fas fa-check-circle text-success mr-2"></i>
                            Logout & login ulang jika perubahan belum tampil
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
{{-- PREVIEW IMAGE --}}
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview-avatar').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

{{-- NOTIFICATION --}}
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
@endsection
