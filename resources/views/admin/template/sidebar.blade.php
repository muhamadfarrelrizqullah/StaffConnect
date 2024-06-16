<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <img alt="Logo" src="assets/media/logos/default.png" class="h-30px app-sidebar-logo-default theme-light-show" />
        <img alt="Logo" src="assets/media/logos/default-dark.png" class="h-30px app-sidebar-logo-default theme-dark-show" />
        <img alt="Logo" src="assets/media/logos/favicon.png" class="h-40px app-sidebar-logo-minimize" />
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-dashboard') ? 'active' : '' }}"
                            href="{{ route('admin-dashboard') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-triangle fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Pages</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-employee') ? 'active' : '' }}"
                            href="{{ route('admin-employee') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-people fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Employees</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-departement') ? 'active' : '' }}"
                            href="{{ route('admin-departement') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-bank fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Departements</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-position') ? 'active' : '' }}"
                            href="{{ route('admin-position') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-price-tag fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Positions</span>
                        </a>
                    </div>
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Account</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::routeIs('admin-profile') ? 'active' : '' }}"
                            href="{{ route('admin-profile') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-setting-4 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Edit Account</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit"
                class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click">
                <span class="btn-label">Logout</span>
                <i class="ki-duotone ki-document btn-icon fs-2 m-0">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </button>
        </form>
    </div>
</div>
