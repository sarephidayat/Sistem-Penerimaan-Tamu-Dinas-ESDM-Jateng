<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan Kunjungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: #f2f4f7;
        }

        .page-wrapper {
            max-width: 900px;
            margin: 30px auto;
        }

        .wizard-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
            padding: 30px 40px;
        }

        .form-control {
            height: 45px;
            border-radius: 6px;
        }

        textarea.form-control {
            height: auto;
        }

        .btn-submit {
            background: #00d084;
            color: #fff;
            border: none;
            padding: 12px 40px;
            font-size: 16px;
            border-radius: 6px;
        }

        .btn-submit:hover {
            background: #00b172;
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="mb-0 font-weight-bold">Dinas ESDM</h5>
            <small class="text-muted">Pemesanan Kunjungan Tamu</small>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-primary">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <div class="wizard-card">

        <h5 class="mb-4 font-weight-bold">Form Pemesanan Kunjungan</h5>

        <form action="{{ route('pemesanan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control"
                       placeholder="Contoh: Agus Budiman" required>
            </div>

            <div class="form-group">
                <label>No. KTP / NIK</label>
                <input type="text" name="nik" class="form-control"
                       placeholder="3203xxxxxxxxxxxx" required>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="no_hp" class="form-control"
                       placeholder="08123456789" required>
            </div>

            <div class="form-group">
                <label>E-Mail</label>
                <input type="email" name="email" class="form-control"
                       placeholder="user@mail.com" required>
            </div>

            <div class="form-group">
                <label>Instansi</label>
                <input type="text" name="instansi" class="form-control">
            </div>

            <div class="form-group">
                <label>Bidang Tujuan</label>
                <select name="id_bidang" class="form-control" required>
                    <option value="">Pilih Bidang</option>
                    @foreach($bidang as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_bidang }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Kunjungan</label>
                        <input type="date" name="tanggal_kunjungan"
                               class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jam Kunjungan</label>
                        <input type="time" name="jam_kunjungan"
                               class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Keperluan</label>
                <textarea name="keperluan" class="form-control" rows="3"
                    placeholder="Contoh: Konsultasi perizinan..."></textarea>
            </div>

            <div class="text-right mt-4">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-calendar-check"></i> Ajukan Pemesanan
                </button>
            </div>

        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil 🎉',
        text: '{{ session('success') }}',
        showConfirmButton: true,
        timer: 3500,
        timerProgressBar: true
    });
</script>
@endif
</body>
</html>
