<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/bmps.png') }}">
    <title>FMS-BulanMPS</title>
    @stack('links')
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/sweetalert/dist/sweetalert2.min.css') }}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.css') }}" id="pagestyle">
    <style>
        .form-control:focus {
            border-color: #2187FE !important;
            box-shadow: 0 0 0 2px #a0b4f6 !important;
        }

        body,
        table,
        div {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @auth
        @yield('auth')
    @endauth
    @guest
        @yield('guest')
    @endguest

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('assets/sweetalert/dist/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.3.7.0.min.js') }}"></script>

    @stack('dashboard')
    @stack('scripts')

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        function updateDateTime() {
            var currentDate = new Date();
            var formattedDateTime = currentDate.toLocaleString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric',
                hour: '2-digit',
                minute: 'numeric',
                second: 'numeric',
                hour12: true,
                weekday: 'long'
            });
            formattedDateTime = formattedDateTime.replace(' at', ' - ');
            document.getElementById("currentDateTime").innerHTML = formattedDateTime;
        }

        setInterval(updateDateTime, 1000);
    </script>

    {{-- script to auto close alert --}}
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 7000);
    </script>

    <!-- Github buttons -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}"></script>

    <script>
        if (window.livewire) {
            window.livewire.on('hideModal', (modalId) => {
                $(modalId).modal('hide');
            });
        }

        window.addEventListener('SwalSuccess', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.addEventListener('SwalError', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: event.detail.message,
                showConfirmButton: true,
            })
        });

        window.addEventListener('already-confirmed', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Deleted',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });
    </script>
</body>

</html>
