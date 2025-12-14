<div class="navbar">
    <div class="navbar-logo" style="margin-left: 50px">
        <img src="{{ asset('storage/img/logo-jateng.jpg') }}" 
             alt="Logo DPU" 
             style="width: 50px; height: 50px; margin-left: 20px;">
        <div>
            <h1 style="color: #1a56a7; font-weight: 600; font-size: 18px;">
                Dinas PU Bina Marga dan Cipta Karya
            </h1>
        </div>
    </div>

    <div style="display: flex; align-items: center; gap: 10px; margin-right: 200px;">
        <nav class="navbar-menu" style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ url('/') }}" class="nav-link active">Beranda</a>
            <a href="{{ url('/maps') }}" class="nav-link">Peta</a>
        </nav>
    </div>
</div>
