<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Buku Tamu Digital (Live Preview)</title>
    <link rel="stylesheet" href="css/checkin.css"/>
  </head>
  <body>
    <div class="container">
      <h1>Form Buku Tamu Digital</h1>

      <form id="guestForm" novalidate>
        <!-- Bagian Data Diri -->
        <fieldset>
          <legend>Data Diri</legend>
          <div class="form-group">
            <label for="fullName">Nama Lengkap *</label>
            <input type="text" id="fullName" name="fullName" required />
            <span class="error-message"></span>
          </div>
          <div class="form-group">
            <label for="idNumber">No. Identitas (KTP/SIM) *</label>
            <input type="text" id="idNumber" name="idNumber" required />
            <span class="error-message"></span>
          </div>
          <div class="form-group">
            <label for="phoneNumber">No. HP/Telepon *</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" required />
            <span class="error-message"></span>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" />
            <span class="error-message"></span>
          </div>
        </fieldset>

        <!-- Bagian Data Kunjungan -->
        <fieldset>
          <legend>Data Kunjungan</legend>
          <div class="form-group">
            <label for="employeeName">Nama Pegawai yang Dituju *</label>
            <input type="text" id="employeeName" name="employeeName" required />
            <span class="error-message"></span>
          </div>
          <div class="form-group">
            <label for="purpose">Tujuan Kunjungan *</label>
            <select id="purpose" name="purpose" required>
              <option value="">-- Pilih Tujuan --</option>
              <option value="Rapat">Rapat</option>
              <option value="Presentasi/Kerjasama">Presentasi/Kerjasama</option>
              <option value="Urusan Administrasi">Urusan Administrasi</option>
              <option value="Lainnya">Lainnya</option>
            </select>
            <span class="error-message"></span>
          </div>
          <div class="form-group">
            <label for="institution">Asal Instansi/Perusahaan *</label>
            <input type="text" id="institution" name="institution" required />
            <span class="error-message"></span>
          </div>
        </fieldset>

        <!-- Bagian Foto Tamu -->
        <fieldset>
          <legend>Foto Tamu (Opsional)</legend>
          <div class="photo-section">
            <div class="photo-placeholder" id="photoPlaceholder">
              <!-- Elemen video ditampilkan di atas gambar -->
              <video id="video" autoplay playsinline></video>
              <img
                src="https://placehold.co/300x400/e0e0e0/757575?text=Foto+Belum+Diambil"
                alt="Foto Tamu"
                id="photoPreview"
              />
            </div>
            <canvas id="canvas"></canvas>
          </div>
          <button type="button" id="capturePhotoBtn">Ambil Foto</button>
        </fieldset>

        <button type="submit" class="submit-btn">Kirim Data</button>
      </form>

      <div id="submissionResult" style="display: none"></div>
    </div>

    <script src="js/checkin.js"></script>
  </body>
</html>
