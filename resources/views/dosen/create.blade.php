@extends('layout.main')

@section('title', 'Tambah Dosen')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Dosen</h1>
    <a href="{{ url('/dosen') }}" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="{{ url('/dosen/store') }}" method="POST">
            @csrf
            <table cellpadding="8" class="w-100">

              <tr>
                <td>NIDN</td>
                <td>
                  <input class="form-control" type="number" name="nidn" value="{{ old('nidn') }}" required>
                  @error('nidn')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </td>
              </tr>

              <tr>
                <td>Nama Dosen</td>
                <td>
                  <input class="form-control" type="text" name="nama_dosen" value="{{ old('nama_dosen') }}" required>
                  @error('nama_dosen')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </td>
              </tr>

              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select class="form-control" name="jenkel_dosen" required>
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Pria" {{ old('jenkel_dosen') == 'Pria' ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{ old('jenkel_dosen') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                  </select>
                  @error('jenkel_dosen')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td colspan="3">
                  <textarea class="form-control" name="alamat_dosen" required>{{ old('alamat_dosen') }}</textarea>
                  @error('alamat_dosen')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </td>
              </tr>
              
              <tr>
                <td>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-danger">Bersihkan</button>
                </td>
              </tr>

            </table>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection
