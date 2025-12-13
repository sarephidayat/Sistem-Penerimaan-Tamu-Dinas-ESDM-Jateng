@extends('admin/layout.main')

@section('title', 'List checkout')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List checkout</h1>
    <a href="{{ url('/checkout/create') }}" class="btn btn-primary">Tambah Data</a>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center" >
                  <h4 class="mb-0">Filter Tanggal Checkout</h4>

                  <div>
                      <a href="{{ route('checkout.export.pdf') }}" class="btn btn-danger">
                          <i class="fas fa-file-pdf"></i> Export PDF
                      </a>
                  </div>
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

                          <div class="col-md-4">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fas fa-filter"></i> Filter
                              </button>

                              <a href="{{ url('/checkout') }}" class="btn btn-secondary ml-2">
                                  Reset
                              </a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>

          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <th width="70px">No</th>
                        <th width="160px">Nama</th>
                        <th width="180px">Email</th>
                        <th width="140px">NIK</th>
                        <th width="160px">Instansi</th>
                        <th width="130px">No HP</th>
                        <th width="160px">Bidang Tujuan</th>
                        <th width="200px">Keperluan</th>
                        <th width="100px">Foto</th>
                        <th width="170px">Waktu Check-In</th>
                        <th width="170px">Waktu Check-Out</th>
                        <th width="220px">Catatan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($checkout as $no => $item)
                    <tr>
                        <td>{{ $no + 1 }}</td>

                        <td>{{ $item->checkin->nama_lengkap }}</td>
                        <td>{{ $item->checkin->email ?? '-' }}</td>
                        <td>{{ $item->checkin->nik }}</td>
                        <td>{{ $item->checkin->instansi ?? '-' }}</td>
                        <td>{{ $item->checkin->no_hp ?? '-' }}</td>

                        {{-- Bidang --}}
                        <td>{{ $item->checkin->bidang->nama_bidang ?? '-' }}</td>

                        {{-- Keperluan --}}
                        <td title="{{ $item->checkin->keperluan }}">
                            {{ \Illuminate\Support\Str::limit($item->checkin->keperluan, 40) }}
                        </td>

                        {{-- Foto --}}
                        <td class="text-center">
                            @if ($item->checkin->foto_selfie)
                                <img src="{{ asset('storage/' . $item->checkin->foto_selfie) }}"
                                    width="60"
                                    class="img-thumbnail">
                            @else
                                -
                            @endif
                        </td>

                        {{-- Waktu Check-In --}}
                        <td>
                            {{ \Carbon\Carbon::parse($item->checkin->waktu_masuk)->format('d-m-Y H:i') }}
                        </td>

                        {{-- Waktu Check-Out --}}
                        <td>
                            {{ \Carbon\Carbon::parse($item->waktu_keluar)->format('d-m-Y H:i') }}
                        </td>

                        {{-- Catatan --}}
                        <td title="{{ $item->catatan }}">
                            {{ $item->catatan ?? '-' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

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
