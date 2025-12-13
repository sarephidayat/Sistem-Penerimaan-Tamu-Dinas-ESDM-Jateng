<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Checkout Tamu</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        .text-center { text-align: center; }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .header h3 {
            margin: 0;
            font-size: 14px;
            font-weight: normal;
        }

        .line { border-top: 2px solid #000; margin: 8px 0; }
        .sub-line { border-top: 1px solid #000; margin-bottom: 15px; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
        }

        th {
            background: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header text-center">
        <h2>Dinas Energi dan Sumber Daya Mineral</h2>
        <h3>Provinsi Jawa Tengah</h3>
        <p>Laporan Tamu Selesai Berkunjung</p>
    </div>

    <div class="line"></div>
    <div class="sub-line"></div>

    <!-- INFO -->
    <p>
        <strong>Tanggal Cetak:</strong> {{ $tanggalCetak }} <br>
        <strong>Total Tamu Checkout:</strong> {{ $totalCheckout }}
    </p>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="15%">Nama</th>
                <th width="15%">Instansi</th>
                <th width="15%">Bidang</th>
                <th width="15%">Waktu Check-In</th>
                <th width="15%">Waktu Check-Out</th>
                <th width="21%">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checkout as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->checkin->nama_lengkap }}</td>
                <td>{{ $item->checkin->instansi ?? '-' }}</td>
                <td>{{ $item->checkin->bidang->nama_bidang ?? '-' }}</td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($item->checkin->waktu_masuk)->format('d-m-Y H:i') }}
                </td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($item->waktu_keluar)->format('d-m-Y H:i') }}
                </td>
                <td>{{ $item->catatan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
