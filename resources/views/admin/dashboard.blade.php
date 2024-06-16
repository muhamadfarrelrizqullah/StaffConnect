@extends('admin.template.main')

@section('title', 'Dashboard Admin - StaffConnect')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Admin Dashboard</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                    </ul>
                </div>
                <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-2 gap-lg-3">
                    <div class="d-flex justify-content-between w-100 gap-2">
                        <input type="date" id="bt-start-date" name="start_date"
                            class="form-control form-control-sm mb-2 mb-lg-0 w-100">
                        <input type="date" id="bt-end-date" name="end_date"
                            class="form-control form-control-sm mb-2 mb-lg-0 w-100">
                    </div>
                    <button type="button" class="btn btn-sm fw-bold btn-secondary w-100 w-lg-auto" id="bt-download">
                        Download
                    </button>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <h1>Dashboard Admin</h1>
            </div>
        </div>
    </div>
@endsection
