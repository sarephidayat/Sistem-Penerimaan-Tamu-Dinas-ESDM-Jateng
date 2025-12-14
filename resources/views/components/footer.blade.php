<footer class="bg-gray-800 text-white pt-12 pb-6 mt-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <div>
                <img src="{{ asset('storage/img/logo-jateng.jpg') }}" alt="">
            </div>

            <div>
                <h3 class="text-xl font-bold mb-4">
                    Dinas PU Bina Marga dan Cipta Karya
                </h3>
                <p class="text-gray-400">
                    Membangun infrastruktur jalan yang berkualitas untuk meningkatkan konektivitas.
                </p>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/maps') }}">Peta</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                <p class="text-gray-400">
                    Jl. Madukoro Blok AA-BB, Semarang
                </p>
            </div>
        </div>

        <div class="border-t border-gray-700 pt-4 text-center text-sm text-gray-400">
            © 2025 Dinas PU Bina Marga dan Cipta Karya
        </div>
    </div>
</footer>
