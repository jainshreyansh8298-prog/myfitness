<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ config('app.logo') }}">
    <title>{{ __('Admin Panel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:slnt,wght@-11..11,200..1000&display=swap"
            rel="stylesheet">
        <style>
            .table-responsive {
                overflow-y: hidden;
            }

            body * {
                font-family: 'Cairo', sans-serif !important;
            }

            .fa,
            .fas,
            .far,
            .fab,
            .material-icons,
            .icon {
                font-family: "Font Awesome 5 Free" !important;
            }

            [dir="rtl"] .tns-outer,
            [dir="rtl"] .tns-horizontal {
                direction: ltr !important;
            }

            .tns-visually-hidden {
                display: none
            }
        </style>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.my-slider').forEach(function(slider) {
                tns({
                    container: slider,
                    loop: true,
                    autoplay: true,
                    autoplayButtonOutput: false, // Hide the autoplay button
                    controls: false, // Hide the navigation controls
                    nav: false, // Hide the navigation dots
                    autoplayTimeout: 2000, // Set autoplay interval (in ms)
                    autoplayHoverPause: true, // Pause autoplay on hover
                });
            });
        });
    </script>
    <style>
        .tns-outer {
            width: 200px !important
        }
    </style>

    <x-dashboard.styles />
    <x-dashboard.scripts-header />

</head>

<body id="page-top" @if (app()->getLocale() == 'ar') dir="rtl" @endif>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-dashboard.side-bar />

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
                        <i class="fa fa-bars"></i>
                    </button>
                    {{-- <form action="{{ route('admins.language.switch') }}" method="POST">
                        @csrf
                        <select name="locale" onchange="this.form.submit()">
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                            <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                        </select>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="ml-auto navbar-nav">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 text-gray-600 d-none d-lg-inline">
                                    {{ Auth::user()->name ?? __('Admin') }}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('storage/' . Auth::user()->image) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="{{ route('admins.profile.edit') }}">
                                    <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i> {{ __('Edit Profile') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admins.password.edit') }}">
                                    <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
                                    {{ __('Change Password') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                                        {{ __('Logout') }}
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    {{ $slot }}

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script></script>

    <x-dashboard.scripts-footer />
    <!-- <script src="{{ asset('build/assets/app-eMHK6VFw.js') }}"></script> -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
