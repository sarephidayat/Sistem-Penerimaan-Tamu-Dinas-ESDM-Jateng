<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Kunjungan Tamu</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .header h3 {
            margin: 0;
            font-size: 14px;
            font-weight: normal;
        }

        .line {
            border-top: 2px solid #000;
            margin: 8px 0;
        }

        .sub-line {
            border-top: 1px solid #000;
            margin-bottom: 15px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 3px 0;
        }

        .summary {
            border: 1px solid #000;
            padding: 8px;
            margin-bottom: 15px;
        }

        .summary table {
            width: 100%;
            text-align: center;
        }

        .summary th {
            font-weight: bold;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        table.data th,
        table.data td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 11px;
        }

        table.data th {
            background: #f2f2f2;
            text-align: center;
        }

        table.data td {
            vertical-align: top;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
        }

        .footer td {
            padding-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <h2>Dinas Energi dan Sumber Daya Mineral</h2>
        <h3>Provinsi Jawa Tengah</h3>
        <p>Jl. Pahlawan No. 123, Semarang</p>
    </div>

    <div class="line"></div>
    <div class="sub-line"></div>

    <!-- JUDUL -->
    <h3 class="text-center">LAPORAN KUNJUNGAN TAMU</h3>

    <!-- INFO -->
    <div class="info">
        <table>
            <tr>
                <td width="20%">Tanggal Cetak</td>
                <td width="2%">:</td>
                <td>{{ $tanggalCetak }}</td>
            </tr>
            <tr>
                <td>Periode</td>
                <td>:</td>
                <td>Harian</td>
            </tr>
        </table>
    </div>

    <!-- RINGKASAN -->
    <div class="summary">
        <table>
            <tr>
                <th>Total Tamu</th>
                <th>Masih Berkunjung</th>
                <th>Sudah Checkout</th>
            </tr>
            <tr>
                <td>{{ $total }}</td>
                <td>{{ $berkunjung }}</td>
                <td>{{ $selesai }}</td>
            </tr>
        </table>
    </div>

    <!-- TABEL DATA -->
    <table class="data">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Nama</th>
                <th width="20%">Instansi</th>
                <th width="20%">Bidang</th>
                <th width="20%">Waktu Masuk</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tamu_hari_ini as $tamu)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $tamu->nama_lengkap }}</td>
                <td>{{ $tamu->instansi ?? '-' }}</td>
                <td>{{ $tamu->bidang->nama_bidang ?? '-' }}</td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($tamu->waktu_masuk)->format('d-m-Y H:i') }}
                </td>
                <td class="text-center">
                    {{ $tamu->status->nama_status ?? '-' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- FOOTER TTD -->
    <table class="footer">
        <tr>
            <td width="60%"></td>
            <td width="40%">
                Semarang, {{ $tanggalCetak }} <br>
                Petugas Pelayanan <br><br><br>
                <strong>______________________</strong>
            </td>
        </tr>
    </table>

</body>
</html>
