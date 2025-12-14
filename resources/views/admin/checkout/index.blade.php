@extends('admin/layout.main')

@section('title', 'List Checkout')

@section('content')
<section class="section">

    {{-- HEADER --}}
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1 class="mb-0">List Check-Out</h1>
    </div>

    <div class="row">
        <div class="col-12">

            {{-- FILTER CARD --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-filter mr-1"></i> Filter Tanggal Check-Out
                    </h4>

                    <a href="{{ route('checkout.export.pdf') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf mr-1"></i> Export PDF
                    </a>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ url('/checkout') }}">
                        <div class="form-row align-items-end">
                            <div class="col-md-4">
                                <label>Tanggal Mulai</label>
                                <input type="date"
                                       name="tanggal_mulai"
                                       class="form-control"
                                       value="{{ request('tanggal_mulai') }}">
                            </div>

                            <div class="col-md-4">
                                <label>Tanggal Selesai</label>
                                <input type="date"
                                       name="tanggal_selesai"
                                       class="form-control"
                                       value="{{ request('tanggal_selesai') }}">
                            </div>

                            <div class="col-md-4 mt-2 mt-md-0">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-search"></i> Filter
                                </button>

                                <a href="{{ url('/checkout') }}" class="btn btn-secondary">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- TABLE CARD --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover table-striped w-100" id="table-1">
                            <thead class="thead-light text-center">
                                
                                <tr>
                                    <th style="width:50px;">No</th>
                                    <th style="width:160px;">Nama</th>
                                    <th style="width:180px;">Email</th>
                                    <th style="width:140px;">NIK</th>
                                    <th style="width:160px;">Instansi</th>
                                    <th style="width:130px;">No HP</th>
                                    <th style="width:160px;">Bidang</th>
                                    <th style="width:220px;">Keperluan</th>
                                    <th style="width:200px;">Foto</th>
                                    <th style="width:170px;">Check-In</th>
                                    <th style="width:170px;">Check-Out</th>
                                    <th style="width:120px;">Catatan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($checkout as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>

                                    <td>{{ $item->checkin->nama_lengkap }}</td>
                                    <td>{{ $item->checkin->email ?? '-' }}</td>
                                    <td>{{ $item->checkin->nik }}</td>
                                    <td>{{ $item->checkin->instansi ?? '-' }}</td>
                                    <td>{{ $item->checkin->no_hp ?? '-' }}</td>

                                    <td>
                                        {{ $item->checkin->bidang->nama_bidang ?? '-' }}
                                    </td>

                                    <td title="{{ $item->checkin->keperluan }}">
                                        {{ \Illuminate\Support\Str::limit($item->checkin->keperluan, 45, '...') }}
                                    </td>

                                    <td class="text-center">
                                    <div style="width:120px; height:120px; margin:auto;">
                                        <img
                                        src="{{ asset('storage/' . $item->checkin->foto_selfie) }}"
                                        style="width:100%; height:100%; object-fit:cover;"
                                        class="img-thumbnail"
                                        >
                                    </div>
                                    </td>


                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($item->checkin->waktu_masuk)->format('d-m-Y H:i') }}
                                    </td>

                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($item->waktu_keluar)->format('d-m-Y H:i') }}
                                    </td>

                                    <td title="{{ $item->catatan }}">
                                        {{ \Illuminate\Support\Str::limit($item->catatan, 50, '...') ?? '-' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
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

<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
