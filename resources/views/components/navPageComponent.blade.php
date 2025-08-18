<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="assets/img/logo.png" alt="">
            <h1 class="sitename" style="color: #D30000;">PABRIK DIMSUM BANDUNG</h1>
        </a>


        @auth
            <a class="btn flex-md-shrink-0" style="background-color: #D30000; color: white;" href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a class="btn flex-md-shrink-0" style="background-color: #D30000; color: white;" href="{{ route('login') }}">Login</a>
        @endauth

    </div>
</header>
