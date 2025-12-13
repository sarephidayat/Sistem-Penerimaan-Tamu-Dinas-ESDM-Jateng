<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Check Out Tamu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body { background: #f2f4f7; }

        .page-wrapper {
            max-width: 1100px;
            margin: 30px auto;
        }

        .wizard-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
            padding: 30px 40px;
        }

        .wizard-steps {
            display: flex;
            margin-bottom: 30px;
        }

        .wizard-step {
            flex: 1;
            padding: 15px 20px;
            background: #f0f1f3;
            border-radius: 8px 8px 0 0;
            margin-right: 10px;
            color: #999;
            font-weight: 600;
        }

        .wizard-step.active {
            background: #fff;
            border-bottom: 3px solid #00d084;
            color: #000;
        }

        .wizard-step i { margin-right: 8px; }

        .form-control {
            height: 45px;
            border-radius: 6px;
        }

        textarea.form-control { height: auto; }

        .wizard-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn-next {
            background: #00d084;
            color: #fff;
            border: none;
            padding: 12px 40px;
            font-size: 16px;
            border-radius: 6px;
        }

        .btn-next:hover { background: #00b172; }

        video { width: 100%; border-radius: 8px; }
    </style>
</head>
<body>

<div class="page-wrapper">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="mb-0 font-weight-bold">DPU Bina Marga Cipta Karya</h5>
            <small class="text-muted">Check Out Dinas Induk</small>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-success">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <div class="wizard-card">

        <!-- STEP HEADER -->
        <div class="wizard-steps">
            <div class="wizard-step active" id="tabStep1">
                <i class="fas fa-id-card"></i> Verifikasi
                <div class="small text-muted">Step 1</div>
            </div>
        </div>

        {{-- ALERT --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST">
    @csrf

    <h5 class="mb-4 font-weight-bold">Verifikasi Data Tamu</h5>

    <div class="form-group">
        <label>No. KTP / NIK</label>
        <input type="text"
               name="nik"
               class="form-control"
               placeholder="Masukkan NIK yang digunakan saat check-in"
               required>
    </div>

    <div class="form-group">
        <label>Catatan (Opsional)</label>
        <textarea name="catatan"
                  class="form-control"
                  rows="3"
                  placeholder="Contoh: Urusan selesai, sudah bertemu petugas"></textarea>
    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-success px-4">
            <i class="fas fa-sign-out-alt"></i> Checkout
        </button>
    </div>
</form>

    </div>
</div>

</body>
</html>
