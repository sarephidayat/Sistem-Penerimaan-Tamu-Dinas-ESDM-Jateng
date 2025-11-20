@extends('layout.main')

@section('title', 'Ubah Data Dosen')

@section('content')
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Dosen</h1>
    <a href="{{ url('/dosen') }}" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="{{ url('/dosen/update/'.$dosen->nidn) }}" method="POST">
            @csrf
            <table cellpadding="8" class="w-100">
              <tr>
                <td>NIDN</td>
                <td>
                  <input class="form-control" type="number" value="{{ $dosen->nidn }}" disabled>
                  <input type="hidden" name="nidn" value="{{ $dosen->nidn }}">
                </td>
              </tr>

              <tr>
                <td>Nama Dosen</td>
                <td>
                  <input class="form-control" type="text" name="nama_dosen" required value="{{ old('nama_dosen', $dosen->nama_dosen) }}">
                  @error('nama_dosen')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </td>
              </tr>

              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select class="form-control" name="jenkel_dosen" required>
                    <option value="Pria" {{ old('jenkel_dosen', $dosen->jenkel_dosen) == 'Pria' ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{ old('jenkel_dosen', $dosen->jenkel_dosen) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                  </select>
                  @error('jenkel_dosen')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td colspan="3">
                  <textarea class="form-control" name="alamat_dosen" required>{{ old('alamat_dosen', $dosen->alamat_dosen) }}</textarea>
                  @error('alamat_dosen')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </td>
              </tr>

              <tr>
                <td>
                  <button type="submit" class="btn btn-primary d-inline">Ubah</button>
                  <a href="{{ url('/dosen') }}" class="btn btn-danger ml-1">Batal</a>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection
