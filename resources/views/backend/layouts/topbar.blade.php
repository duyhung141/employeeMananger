<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ url('img/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ url('img/logo-light.png') }}" alt="" height="17">
                        </span>
                    </a>
                    <a href="" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ url('img/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ url('img/logo-light.png') }}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-md-block" action="">
                    <div class="position-relative">
                        <input type="hidden" name="role" value="all">
                        <input type="text" name="contact_info" class="form-control search_box_suggestion" placeholder="Tìm kiếm khách hàng" data-remote="" autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px;">
                            <!-- item-->
                            <div class="dropdown-header"></div>
                            <!-- item -->
                            <div class="result-search" id="search-result"></div>
                        </div>
                        <div class="text-center pt-3 pb-1">
                            <a href="" class="btn btn-soft-primary btn-sm">Xem danh sách khách hàng <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3" action="">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="hidden" name="role" value="all">
                                    <input type="text" name="contact_info" class="form-control" placeholder="Tìm kiếm khách hàng" aria-label="Tìm kiếm khách hàng">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="header-item">
                    <a style="line-height: 21px" href="https://help.tourwell.vn/tourwell/" target="_blank" class="btn btn-sm btn-ghost-secondary rounded-1 fs-14" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hướng dẫn sử dụng">
                        <i class='ri-question-line fs-22 align-middle text-muted'></i> <span>Trợ giúp</span>
                    </a>
                </div>

                <div class="header-item d-none">
                    <a style="line-height: 21px" href="https://help.tourwell.vn/tourwell/" target="_blank" class="btn btn-sm btn-ghost-secondary rounded-1 fs-14" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Góp ý, đề xuất cải tiến, hướng dẫn sử dụng vv..">
                        <i class='ri-feedback-line fs-22 align-middle text-muted'></i> <span>Góp ý</span>
                    </a>
                </div>
{{--                @if(--}}
{{--                    $logged_in_user->can('admin.order.create') ||--}}
{{--                    $logged_in_user->can('admin.customer.create') ||--}}
{{--                    $logged_in_user->can('admin.product.create')--}}
{{--                    )--}}
{{--                    <div class="dropdown ms-1 topbar-head-dropdown header-item">--}}
{{--                        <button type="button" class="btn btn-sm btn-ghost-secondary rounded-1 fs-14"--}}
{{--                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="bx bx-plus-circle fs-22 align-middle text-muted"></i> <span>Tạo nhanh</span>--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu dropdown-menu-end">--}}
{{--                            @if($logged_in_user->can('admin.order.create'))--}}
{{--                                <!-- item-->--}}
{{--                                <a href="{{ route('admin.order.create') }}" class="dropdown-item notify-item py-2">--}}
{{--                                    <span class="align-middle"><i class="ri-add-fill me-1 align-middle"></i> Đơn hàng</span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                            @if($logged_in_user->can('admin.customer.create'))--}}
{{--                                <!-- item-->--}}
{{--                                <a href="{{ route('admin.customer.index') }}" class="dropdown-item notify-item py-2">--}}
{{--                                    <span class="align-middle"><i class="ri-add-fill me-1 align-middle"></i> Khách hàng</span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                            @if($logged_in_user->can('admin.product.create'))--}}
{{--                                <!-- item-->--}}
{{--                                <a href="{{ route('admin.product.create') }}" class="dropdown-item notify-item py-2">--}}
{{--                                    <span class="align-middle"><i class="ri-add-fill me-1 align-bottom"></i> Sản phẩm</span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

                <div class="dropdown topbar-head-dropdown ms-1 header-item d-none">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category-alt fs-22'></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                        <div class="p-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/github.png') }}" alt="Github">
                                        <span>Khách hàng</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/bitbucket.png') }}" alt="bitbucket">
                                        <span>Sản phẩm</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/dribbble.png') }}" alt="dribbble">
                                        <span>Đơn hàng</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/dropbox.png') }}" alt="dropbox">
                                        <span>Điều hành</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/mail_chimp.png') }}" alt="mail_chimp">
                                        <span>Phiếu thu</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/slack.png') }}" alt="slack">
                                        <span>Phiếu chi</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                @include('includes.partials.notification')--}}

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="" alt="">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">1241253</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Tài khoản</span>
                            </span>
                        </span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Hi, 1346g!</h6>
                        <a class="dropdown-item" href="">
                            <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">@lang('My Account')</span>
                        </a>
{{--                        @if($logged_in_user->checkConfig('admin.config.ta_crm.enable'))--}}
{{--                            <a class="dropdown-item" href="{{ home_ta_crm_route() }}">--}}
{{--                                <i class="ri-login-circle-line text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Hệ thống đại lý</span>--}}
{{--                            </a>--}}
{{--                        @endif--}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="">
                            <i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">@lang('Settings')</span>
                        </a>
                        <a class="dropdown-item " href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span key="t-logout">@lang('Logout')</span>
                        </a>
                        <form id="logout-form" action="" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
