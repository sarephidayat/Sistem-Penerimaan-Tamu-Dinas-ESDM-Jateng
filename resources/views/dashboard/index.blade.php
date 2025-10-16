@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <!-- Total Dosen -->
    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Dosen</h4>
          </div>
          <div class="card-body">
            {{ $total_dosen }}
          </div>
        </div>
      </div>
    </div> --}}

    <!-- Total User -->
    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total User</h4>
          </div>
          <div class="card-body">
            {{ $total_user }}
          </div>
        </div>
      </div>
    </div> --}}

    <!-- Total Mata Kuliah -->
    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Mata Kuliah</h4>
          </div>
          <div class="card-body">
            {{ $total_matakuliah }}
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</section>
@endsection
