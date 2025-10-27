<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penerimaan Tamu Digital - Aman & Praktis</title>
    <style>
        /* --- CSS Variables & Reset --- */
        :root {
            --primary-color: #007bff;
            --secondary-color: #28a745;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
            --text-color: #555;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: #ffffff;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h1, h2, h3 {
            color: var(--dark-color);
            line-height: 1.2;
        }

        h1 { font-size: 3rem; }
        h2 { font-size: 2.5rem; text-align: center; margin-bottom: 1rem; }
        h3 { font-size: 1.5rem; }

        p { margin-bottom: 1rem; }

        section {
            padding: 60px 0;
        }

        /* --- Hero Section --- */
        .hero {
            background: linear-gradient(rgba(0, 123, 255, 0.8), rgba(0, 123, 255, 0.8)), url('https://source.unsplash.com/random/1600x900/?office,reception') no-repeat center center/cover;
            color: #ffffff;
            text-align: center;
            padding: 100px 0;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content h1 {
            color: #ffffff;
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.25rem;
            max-width: 700px;
            margin: 0 auto 2rem auto;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        /* --- Features Section --- */
        #features {
            background-color: var(--light-color);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .feature-item {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* --- How It Works Section --- */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            text-align: center;
        }

        .step-item {
            position: relative;
        }

        .step-number {
            background-color: var(--primary-color);
            color: #fff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 1rem auto;
        }

        /* --- Footer --- */
        footer {
            background-color: var(--dark-color);
            color: #ffffff;
            text-align: center;
            padding: 30px 0;
        }

        /* --- Responsive Design --- */
        @media (max-width: 768px) {
            h1 { font-size: 2.5rem; }
            .hero-content h1 { font-size: 2.8rem; }
            h2 { font-size: 2rem; }
            .hero { padding: 80px 0; height: auto; }
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>Selamat Datang di Masa Depan Penerimaan Tamu</h1>
            <p>Nikmati pengalaman check-in yang lebih cepat, aman, dan profesional. Tinggalkan cara lama yang merepotkan dan beralih ke solusi digital kami.</p>
            <a href="form.html" class="btn btn-primary">Mulai Check-in Sekarang</a>
        </div>
    </header>

    <main>
        <!-- Features Section -->
        <section id="features">
            <div class="container">
                <h2>Mengapa Sistem Kami Lebih Baik?</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">⚡</div>
                        <h3>Praktis & Cepat</h3>
                        <p>Proses pendaftaran tamu menjadi jauh lebih singkat. Tidak perlu lagi mengisi formulir kertas yang memakan waktu dan berisiko hilang.</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">🔒</div>
                        <h3>Aman & Terpercaya</h3>
                        <p>Data tamu disimpan secara digital dan terenkripsi. Foto tamu memastikan identitas yang tercatat akurat, meningkatkan keamanan kantor Anda.</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">📊</div>
                        <h3>Tercatat Rapi</h3>
                        <p>Semua data kunjungan tersimpan secara terorganisir di satu tempat. Mudah untuk diakses, dianalisis, dan dibuat laporan kapan saja.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works">
            <div class="container">
                <h2>Cara Menggunakan Sangat Mudah</h2>
                <div class="steps-grid">
                    <div class="step-item">
                        <div class="step-number">1</div>
                        <h3>Isi Data Diri</h3>
                        <p>Lengkapi formulir digital dengan data diri dan tujuan kunjungan Anda dengan cepat.</p>
                    </div>
                    <div class="step-item">
                        <div class="step-number">2</div>
                        <h3>Ambil Foto (Opsional)</h3>
                        <p>Ambil foto selfie Anda untuk keperluan verifikasi dan keamanan. Prosesnya instan!</p>
                    </div>
                    <div class="step-item">
                        <div class="step-number">3</div>
                        <h3>Kirim & Tunggu</h3>
                        <p>Klik tombol kirim. Data Anda akan langsung diterima, dan kami akan segera memproses kedatangan Anda.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Sistem Penerimaan Tamu Digital. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>
</html>