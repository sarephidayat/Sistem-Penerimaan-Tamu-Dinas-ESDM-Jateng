@extends('admin/layout.main')

@section('title', 'List Checkin')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Checkin</h1>
    <a href="{{ url('/checkin/create') }}" class="btn btn-primary">Tambah Data</a>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>Instansi</th>
                  <th>Bidang Tujuan</th>
                  <th>Status</th>
                  <th style="width: 200px">Waktu Masuk</th>
                  <th style="width: 200px">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($checkins as $d)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $d->nik }}</td>
                  <td>{{ $d->nama_lengkap }}</td>
                  <td>{{ $d->instansi ?? '-' }}</td>

                  <td>
                    {{ $d->bidang->nama_bidang ?? $d->bidang_tujuan ?? '-' }}
                  </td>

                  <td>
                    <span class="badge badge-{{ $d->id_status == 1 ? 'warning' : ($d->id_status == 2 ? 'info' : ($d->id_status == 3 ? 'success' : 'danger')) }}">
                      {{ $d->status->nama_status ?? 'Tidak diketahui' }}
                    </span>
                  </td>

                  <td>{{ $d->waktu_masuk ? $d->waktu_masuk->format('d-m-Y H:i') : '-' }}</td>

                  <td>
                    <a href="{{ url('/checkin/'.$d->id) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ url('/checkin/'.$d->id.'/edit') }}" class="btn btn-sm btn-info">
                      <i class="fas fa-edit fa-fw"></i>
                    </a>

                    <form action="{{ url('/checkin/'.$d->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fas fa-trash fa-fw"></i>
                      </button>
                    </form>

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
