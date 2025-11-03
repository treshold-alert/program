<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="assets/img/logo.png" alt="">
            <h1 class="sitename" style="color: #D30000;">PABRIK DIMSUM BANDUNG</h1>
        </a>

        <a class="btn flex-md-shrink-0" href="{{ route('home') }}">Beranda</a>
        @auth
            {{-- <a class="btn flex-md-shrink-0" style="background-color: #D30000; color: white;"
                href="{{ route('dashboard') }}">Dashboard</a> --}}
            @if (Auth::user()->role === 'pabrik')
            <a class="btn flex-md-shrink-0" href="{{ route('products.reportedFactory') }}">Laporan</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn flex-md-shrink-0" style="background-color: #D30000; color: white;">
                    Keluar
                </button>
            </form>
            @else
                <a class="btn flex-md-shrink-0" style="background-color: #D30000; color: white;"
                    href="{{ route('dashboard') }}">Dashboard</a>
            @endif
        @else
            <a class="btn flex-md-shrink-0" style="background-color: #D30000; color: white;"
                href="{{ route('login') }}">Login</a>
        @endauth



    </div>
</header>
