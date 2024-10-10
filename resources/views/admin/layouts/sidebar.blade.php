<style>
    span.lan-3 {
        color: rgb(0, 0, 0) !important;
    }

    a.lan-4 {
        color: black !important;
    }

    ::before {
        color: black;
    }

    .simplebar-content-wrapper {
        background: white;
    }

    input.form-control,
    textarea.form-control {
        background: #ec322314 !important;
    }

    input.btn.btn-primary {
        background: red !important;
        border: none !important;
    }

    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active {
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
        position: relative;
        margin-bottom: 10px;
        background-color: transparent !important;
    }

    a.sidebar-link.sidebar-title.clickable:hover {
        background: rgba(128, 128, 128, 0.317)  !important;


    }
</style>
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a style="font-weight:900; text-decoration: none" href="{{ url('/') }}" class=" row justify-content-center">Brewery</a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a style="font-weight:900;color: #ec3223;text-decoration: none" href="{{ url('/') }}">Brewery</a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a style="font-weight:900;color: #ec3223;text-decoration: none" href="{{ url('/') }}">Brewery</a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    @if (auth()->user()->role_id == 1)
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/dashboard' ? 'active1' : '' }}"
                            href="{{ url('/admin/dashboard')}}"> <span class="lan-3">&nbsp&nbspDashboard</span>

                        </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/users' ? 'active1' : '' }}"
                            href="{{ url('/admin/users') }}"> <span class="lan-3">&nbsp&nbsp Users Managment</span>

                        </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == '/admin/feeds' ? 'active1' : '' }}"
                            href="{{ url('/admin/feeds') }}"> <span class="lan-3">&nbsp&nbsp Videos Managment</span>

                        </a>
                    </li>
                    @else
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'vendor/dashboard' ? 'active1' : '' }}"
                            href="{{ url('/vendor/dashboard')}}"> <span class="lan-3">&nbsp&nbspDashboard</span>

                        </a>
                    </li>
                    @endif




                    {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title clickable {{ request()->route()->uri == 'admin/car_brands' ? 'active' : ' ' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspCar Brands</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri == 'admin/car_brands' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/car_brands') }}" data-bs-original-title=""
                                    title="">Car Brands</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/car_brands/add') }}" data-bs-original-title=""
                                    title="">Add Car Brands</a>
                            </li>
                        </ul>
                    </li> --}}

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
