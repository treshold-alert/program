<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="assets /" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/assets/vendor/fonts/materialdesignicons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
</head>
<style>
    .swal2-container {
        z-index: 9999 !important;
        /* pastikan ini lebih tinggi dari elemen lain */
    }
</style>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('components.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('components.navbarComponent')
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row gy-4">
                            @yield('content')
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('components.footerComponent')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js /assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                text: '->first',
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
                title: '('success',
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
                text: '('error',
            })
        </script>
    @endif

    pt>
        if (window.location.hash === '#success') {
            history.replaceState(null, null, ' ');
        } else if (window.performance && window.performance.navigation.type === window.performance.navigation
            .TYPE_BACK_FORWARD) {
            window.location.href = 'category.admin';
        }
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan event listener untuk semua elemen dengan class 'open-modal'
            document.querySelectorAll('.open-modal').forEach(function(element) {
                element.addEventListener('click', function() {
                    // Ambil data-photo dari elemen yang diklik
                    const photo = this.getAttribute('data-photo');
                    // Set src dari img di dalam modal dengan foto yang diambil
                    document.getElementById('modalPhoto').setAttribute('src', photo);
                    // Tampilkan modal
                    $('#photoModal').modal('show');
                });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.edit-product').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const code = this.dataset.code;
                const image = this.dataset.image;

                // Isi nilai form
                document.getElementById('editName').value = name;
                document.getElementById('editCode').value = code;

                // Ganti src gambar
                const imgPreview = document.getElementById('editProductImage');
                imgPreview.src = `/storage/${image}`;

                // Ubah action form dengan route update
                const form = document.getElementById('editProductForm');
                form.action = `/products/${id}`; // Sesuaikan dengan route update produk kamu

                // Tampilkan modal
                new bootstrap.Modal(document.getElementById('editProductModal')).show();
            });
        });
    </script>

    <form id="deleteProductForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        document.querySelectorAll('.delete-product').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.id;
                const productName = this.dataset.name;

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Produk "${productName}" akan dihapus!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById('deleteProductForm');
                        form.action = `/products/${productId}`;
                        form.submit();
                    }
                });
            });
        });
    </script>

    <script>
        // Buka modal dan isi data
        $('.stock-product').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const code = $(this).data('code');

            $('#stockProductId').val(id);
            $('#stockProductName').text(name);
            $('#stockProductCode').text(code);

            $('#stockProductModal').modal('show');
        });

        // Handle submit pakai SweetAlert konfirmasi
        $('#stockProductForm').on('submit', function(e) {
            e.preventDefault();
            const form = this;

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Stok akan ditambahkan.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan event listener untuk semua elemen dengan class 'open-modal'
            document.querySelectorAll('.open-modal').forEach(function(element) {
                element.addEventListener('click', function() {
                    // Ambil data-photo dari elemen yang diklik
                    const photo = this.getAttribute('data-photo');
                    // Set src dari img di dalam modal dengan foto yang diambil
                    document.getElementById('modalPhoto').setAttribute('src', photo);
                    // Tampilkan modal
                    $('#photoModal').modal('show');
                });
            });
        });
    </script>


</body>

</html>
