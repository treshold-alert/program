<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Auth Pages</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/materialdesignicons.css') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    @yield('content')

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ $errors->first() }}",
            });
        @endif
    </script>
    <script>
        @if (session('status') && session('show_verification_modal'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('status') }}",
                timer: 1500,
                showConfirmButton: true
            }).then(() => {
                // Setelah SweetAlert ditutup, tampilkan modal Bootstrap
                var myModal = new bootstrap.Modal(document.getElementById('verificationModal'));
                myModal.show();
            });
        @endif
    </script>


    <!-- Modal -->
    <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifyModalLabel">Verifikasi WhatsApp</h5>
                </div>
                <div class="modal-body text-center">
                    <p>
                        Harap masukkan kode <strong>"join least-flower"</strong> pada nomor WhatsApp ini (+14155238886):
                    </p>
                    <p>
                        <a href="https://wa.me/14155238886?text=join least-flower" target="_blank" class="btn btn-success">
                            Klik di sini untuk kirim kode ke WhatsApp
                        </a>
                    </p>
                    <div class="form-check d-flex justify-content-center mt-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="agreeCheck">
                        <label class="form-check-label" for="agreeCheck">
                            Saya sudah mengirimkan kode verifikasi.
                        </label>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" id="continueBtn" class="btn btn-primary" disabled>Lanjut</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk aktifkan tombol & tampilkan modal -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = new bootstrap.Modal(document.getElementById('verifyModal'));
            modal.show();

            const check = document.getElementById('agreeCheck');
            const button = document.getElementById('continueBtn');

            check.addEventListener('change', function() {
                button.disabled = !this.checked;
            });

            button.addEventListener('click', function() {
                window.location.href = "{{ route('dashboard') }}"; // Ganti ke route yang kamu inginkan
            });
        });
    </script>
</body>

</html>
