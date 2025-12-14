<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital | Dinas ESDM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: #f4f6f9;
            min-height: 100vh;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-menu {
            border-radius: 12px;
            padding: 30px;
            color: #fff;
            height: 180px;
            cursor: pointer;
            transition: all .3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,.15);
        }

        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,.25);
        }

        .card-menu i {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 24px;
            font-weight: 700;
        }

        .card-subtitle {
            font-size: 14px;
            opacity: .9;
        }

        .checkin {
            background: linear-gradient(135deg, #4facfe, #00c6fb);
        }

        .checkout {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
        }
        
        .pemesanan {
            background: linear-gradient(135deg, #c61919, #ff0000);
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h4 {
            font-weight: 700;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="container">

        <!-- LOGO / HEADER -->
        <div class="logo">
            <h4>BUKU TAMU DIGITAL</h4>
            <p class="text-muted">Dinas Energi dan Sumber Daya Mineral</p>
        </div>

        <!-- MENU -->
        <div class="row justify-content-center">

            <!-- CHECK IN -->
            <div class="col-md-5 mb-4">
                <a href="{{ url('/form-checkin') }}" class="text-decoration-none">
                    <div class="card-menu checkin d-flex align-items-center">
                        <div>
                            <i class="fas fa-sign-in-alt"></i>
                            <div class="card-title">Check In</div>
                            <div class="card-subtitle">Form Datang</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- CHECK OUT -->
            <div class="col-md-5 mb-4">
                <a href="{{ url('/form-checkout') }}" class="text-decoration-none">
                    <div class="card-menu checkout d-flex align-items-center">
                        <div>
                            <i class="fas fa-sign-out-alt"></i>
                            <div class="card-title">Check Out</div>
                            <div class="card-subtitle">Form Pulang</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- CHECK OUT -->
            <div class="col-md-5 mb-4">
                <a href="{{ url('/form-pemesanan') }}" class="text-decoration-none">
                    <div class="card-menu pemesanan d-flex align-items-center">
                        <div>
                            <i class="fas fa-sign-out-alt"></i>
                            <div class="card-title">Booking</div>
                            <div class="card-subtitle">Form Booking</div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

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
