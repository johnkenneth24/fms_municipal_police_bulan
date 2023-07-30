@push('links')
    <style>
        .sidenav {
            background-color: #2e92df !important;
            overflow: hidden !important;
        }

        .sidenav .nav-link-text {
            color: #ffffff !important;
        }

        .navbar-vertical .navbar-nav>.nav-item .nav-link.active .icon {
            background-image: linear-gradient(310deg, #0025a9, rgb(0, 174, 255)) !important;
        }

        .navbar-vertical.navbar-expand-xs .navbar-collapse {
            display: block !important;
            height: auto !important;
            overflow: hidden !important;
        }

        .navbar-vertical .navbar-nav>.nav-item .nav-link.active .nav-link-text {
            color: #434343 !important;
        }
    </style>
@endpush

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-2 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/bmps.png') }}" class="navbar-brand-img me-1 ms-0" style="max-height: 60px;"
                alt="...">
            <span class="ms-1 font-weight-bold text-logo" style="color: #ffffff; font-size: 15px;">FMS - Bulan
                MPS</span>
        </a>
    </div>
    <hr class="horizontal dark mt-2 mb-1">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main" style="height: 100vh;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>office</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="office" transform="translate(153.000000, 2.000000)">
                                            <path class="color-background"
                                                d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                                                id="Path" opacity="0.6"></path>
                                            <path class="color-background"
                                                d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Records</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('crime-record.*') ? 'active' : '' }}"
                    href="{{ route('crime-record.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;"
                            class="ni ni-book-bookmark ps-2 pe-2 text-center text-dark {{ request()->routeIs('crime-record.*') ? 'text-white' : '' }} "
                            aria-hidden="true">
                        </i>
                    </div>
                    <span class="nav-link-text ms-1">Crime Records</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('case-solved.*') ? 'active' : '' }}"
                    href="{{ route('case-solved.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;"
                            class="ni ni-check-bold ps-2 pe-2 text-center text-dark {{ request()->routeIs('case-solved.*') ? 'text-white' : '' }}"
                            aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Case Solved</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('case-cleared.*') ? 'active' : '' }}"
                    href="{{ route('case-cleared.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;"
                            class="ni ni-tag ps-2 pe-2 text-center text-dark {{ request()->routeIs('case-cleared.*') ? 'text-white' : '' }}"
                            aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Case Cleared</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('case-investigation.*') ? 'active' : '' }}"
                    href="{{ route('case-investigation.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;"
                            class="ni ni-badge ps-2 pe-2 text-center text-dark {{ request()->routeIs('case-investigation.*') ? 'text-white' : '' }}"
                            aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Under Investigation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('suspect.*') ? 'active' : '' }}"
                    href="{{ route('suspect.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;"
                            class="fa fa-id-badge ps-2 pe-2 text-center text-dark {{ request()->routeIs('suspect.*') ? 'text-white' : '' }}"
                            aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Suspect</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('victim.*') ? 'active' : '' }}"
                    href="{{ route('victim.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;"
                            class="fa fa-user ps-2 pe-2 text-center text-dark {{ request()->routeIs('victim.*') ? 'text-white' : '' }}"
                            aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Victim</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ request()->routeIs('crime-graph.*') ? 'active' : '' }}"
                    href="{{ route('crime-graph.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                        <i style="font-size: 1rem;"
                            class="fa fa-bar-chart fa-list-ul ps-2 pe-2 text-center text-dark {{ request()->routeIs('crime-graph.*') ? 'text-white' : '' }}"
                            aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Crime Infographs</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
