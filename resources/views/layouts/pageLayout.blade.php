<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('page/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('page/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('page/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('page/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('page/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('page/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('page/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
    .swal2-container {
        z-index: 9999 !important;
        /* pastikan ini lebih tinggi dari elemen lain */
    }
</style>

<body class="index-page">

    <!-- ======= Header ======= -->
    @include('components.navPageComponent')
    <!-- End Header -->

    <div class="main">
        @yield('content')
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('page/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('page/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('page/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('page/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('page/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('page/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('page/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>


    <!-- SweetAlert (jika pakai) -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main JS File -->
    <script src="{{ asset('page/js/main.js') }}"></script>

    <script>
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }
    </script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error to add product',
                text: '{{ $errors->first() }}',
                timer: 2500,
                showConfirmButton: false,
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @yield('script')
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            })
        </script>
    @endif

    <script>
        // Buka modal dan isi data
        $(document).on('click', '.stock-out-product', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');

            $('#stockOutProductId').val(id);
            $('#stockOutProductName').text('Produk: ' + name);
            $('#stockOutModal').modal('show');
        });

        // Konfirmasi SweetAlert saat submit Stock OUT
        $('#stockOutForm').on('submit', function(e) {
            e.preventDefault();
            const form = this;

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Stok akan dikurangi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kurangi!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>

</body>

</html>
