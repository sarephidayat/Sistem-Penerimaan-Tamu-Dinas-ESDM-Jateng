<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial; background:#f5f5f5; padding:20px;">

<div style="max-width:600px; background:#fff; margin:auto; padding:20px; border-radius:8px;">
    <h3 style="color:#2c3e50;">Konfirmasi Pemesanan Kunjungan</h3>

    <p>Yth. <strong>{{ $pemesanan->nama_lengkap }}</strong>,</p>

    <p>
        Permohonan pemesanan kunjungan Anda ke
        <strong>Dinas ESDM</strong> telah:
    </p>

    <h2 style="color:
        {{ $statusText == 'Disetujui' ? '#28a745' : '#dc3545' }}">
        {{ strtoupper($statusText) }}
    </h2>

    <hr>

    <p><strong>Bidang Tujuan:</strong> {{ $pemesanan->bidang->nama_bidang }}</p>
    <p><strong>Tanggal:</strong> {{ $pemesanan->tanggal_kunjungan->format('d-m-Y') }}</p>
    <p><strong>Jam:</strong> {{ $pemesanan->jam_kunjungan }}</p>

    @if($pemesanan->catatan_admin)
        <p><strong>Catatan:</strong><br>
        {{ $pemesanan->catatan_admin }}</p>
    @endif

    <hr>

    <p style="font-size:13px; color:#666;">
        Mohon datang sesuai jadwal yang ditentukan.<br>
        Email ini dikirim otomatis oleh sistem.
    </p>

    <p>Hormat kami,<br><strong>Dinas ESDM</strong></p>
</div>

</body>
</html>
