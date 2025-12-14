<footer class="main-footer">
  <div class="footer-left">
    UIN WS
  </div>
  <div class="footer-right"></div>
</footer>

<!-- =====================
     CORE JS
===================== -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- =====================
     STISLA CORE
===================== -->
<script src="{{ asset('js/stisla.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- =====================
     JS LIBRARIES
===================== -->
<script src="{{ asset('modules/chart.min.js') }}"></script>
<script src="{{ asset('modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('modules/izitoast/js/iziToast.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- PAGE SPECIFIC SCRIPT --}}
@yield('scripts')

{{-- =====================
     SWEETALERT
===================== --}}
@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@if (session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: '{{ session('error') }}'
});
</script>
@endif
