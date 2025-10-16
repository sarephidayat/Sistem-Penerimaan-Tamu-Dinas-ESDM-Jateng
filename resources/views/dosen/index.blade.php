@extends('layout.main')

@section('title', 'List Dosen')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Dosen</h1>
    <a href="{{ url('/dosen/create') }}" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th style="width: 150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dosen as $d)
                <tr>
                  <td>{{ $d->nidn }}</td>
                  <td>{{ $d->nama_dosen }}</td>
                  <td>{{ $d->jenkel_dosen }}</td>
                  <td>{{ $d->alamat_dosen }}</td>
                  <td>
                    <a href="{{ url('/dosen/edit/'.$d->nidn) }}" class="btn btn-sm btn-info">
                      <i class="fas fa-edit fa-fw"></i>
                    </a>
                    <a href="{{ url('/dosen/delete/'.$d->nidn) }}" class="btn btn-sm btn-danger"
                      onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <i class="fas fa-trash fa-fw"></i>
                    </a>
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