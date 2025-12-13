<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Check In Tamu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: #f2f4f7;
        }

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

        /* STEP HEADER */
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
            border-bottom: 3px solid #0d6efd;
            color: #000;
        }

        .wizard-step i {
            margin-right: 8px;
        }

        /* FORM */
        .form-control {
            height: 45px;
            border-radius: 6px;
        }

        textarea.form-control {
            height: auto;
        }

        /* FOOTER */
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

        .btn-next:hover {
            background: #00b172;
        }

        video {
            width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="mb-0 font-weight-bold">DPU Bina Marga Cipta Karya</h5>
            <small class="text-muted">Check In Dinas Induk</small>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-primary">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <div class="wizard-card">

        <!-- STEP INDICATOR -->
        <div class="wizard-steps">
            <div class="wizard-step active" id="tabStep1">
                <i class="fas fa-book"></i> Buku Tamu
                <div class="small text-muted">Step 1</div>
            </div>
            <div class="wizard-step" id="tabStep2">
                <i class="fas fa-camera"></i> Foto
                <div class="small text-muted">Step 2</div>
            </div>
        </div>

        <form action="{{ route('checkin.store') }}" method="POST">
            @csrf

            <!-- ================= STEP 1 ================= -->
            <div id="step1">
                <h5 class="mb-4 font-weight-bold">Silakan Lengkapi Data Berikut</h5>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh : Agus Budiman" required>
                </div>

                <div class="form-group">
                    <label>No. KTP / NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="3203xxxxxxxxxxxx" required>
                </div>

                <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="08123456789">
                </div>

                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" name="email" class="form-control" placeholder="user@mail.com">
                </div>

                <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" name="instansi" class="form-control">
                </div>

                <div class="form-group">
                    <label>Bidang Yang Dituju</label>
                    <select name="id_bidang" class="form-control" required>
                        <option value="">Pilih Bidang</option>
                        @foreach($bidang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_bidang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Keperluan</label>
                    <textarea name="keperluan" class="form-control" rows="3"
                        placeholder="Contoh: Mengurus surat perizinan..."></textarea>
                </div>

                <div class="wizard-footer">
                    <button type="button" class="btn-next" onclick="goStep2()">Next</button>
                </div>
            </div>

            <!-- ================= STEP 2 ================= -->
<div id="step2" style="display:none;">
    <h5 class="mb-4 font-weight-bold text-center">Ambil Gambar</h5>

    <!-- CAMERA -->
    <div class="text-center" id="cameraArea">
        <video id="video" autoplay></video>
        <br>
        <button type="button" class="btn btn-primary mt-3" onclick="takePhoto()">
            <i class="fas fa-camera"></i> Ambil Gambar
        </button>
    </div>

    <!-- PREVIEW -->
    <div class="text-center" id="previewArea" style="display:none;">
        <img id="photoPreview" class="img-thumbnail mb-3" width="260">

        <div>
            <button type="button" class="btn btn-warning" onclick="retakePhoto()">
                <i class="fas fa-redo"></i> Ambil Gambar Ulang
            </button>
        </div>
    </div>

    <input type="hidden" name="foto_selfie" id="foto_selfie">

    <!-- ACTION -->
    <div class="wizard-footer">
        <button type="button" class="btn btn-secondary mr-2" onclick="backToStep1()">Previous</button>
        <button type="submit" class="btn-next">Submit</button>
    </div>
</div>

<canvas id="canvas" class="d-none"></canvas>


        </form>
    </div>
</div>

<script>
let video = document.getElementById('video');
let canvas = document.getElementById('canvas');
let preview = document.getElementById('photoPreview');
let fotoInput = document.getElementById('foto_selfie');
let stream = null;

function goStep2() {
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';

    document.getElementById('tabStep1').classList.remove('active');
    document.getElementById('tabStep2').classList.add('active');

    startCamera();
}

function backToStep1() {
    stopCamera();
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step1').style.display = 'block';

    document.getElementById('tabStep2').classList.remove('active');
    document.getElementById('tabStep1').classList.add('active');
}

function startCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(s => {
            stream = s;
            video.srcObject = stream;
        });
}

function stopCamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }
}

function takePhoto() {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    let imageData = canvas.toDataURL('image/png');
    fotoInput.value = imageData;

    preview.src = imageData;

    // UI switch
    document.getElementById('cameraArea').style.display = 'none';
    document.getElementById('previewArea').style.display = 'block';

    stopCamera();
}

function retakePhoto() {
    fotoInput.value = '';
    document.getElementById('previewArea').style.display = 'none';
    document.getElementById('cameraArea').style.display = 'block';

    startCamera();
}
</script>


</body>
</html>
