@extends('admin.template.main')

@section('title', 'Edit Profile - StaffConnect')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-8 mb-xl-10">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <div class="card-header cursor-pointer">
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Profile Details</h3>
                                </div>
                                <a href="{{ route('admin-profileedit') }}"
                                    class="btn btn-sm btn-primary align-self-center">Edit
                                    Profile</a>
                            </div>
                            <div class="card-body p-9">
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Name</label>
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->name }}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Email</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Status</label>
                                    <div class="col-lg-8 fv-row">
                                        @if (auth()->user()->status == 'Active')
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">Inactive</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                    <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Profile Information</h4>
                                            <div class="fs-6 text-gray-700">Please ensure your profile information is
                                                up-to-date.
                                                If you need to make any changes, click on the <a class="fw-bold"
                                                    href="{{ route('admin-profileedit') }}">Edit Profile</a> button above.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-5 mb-xl-10">
                        <div class="card h-md-100" dir="ltr">
                            <div class="card-body d-flex flex-column flex-center">
                                <div class="mb-2">
                                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">Is your <span
                                            class="fw-bolder">Current Profile</span>
                                        <br />
                                        Updated Correctly?
                                    </h1>
                                    <div class="py-10 text-center">
                                        <img src="assets/media/svg/illustrations/easy/1.svg"
                                            class="theme-light-show w-200px" alt="" />
                                        <img src="assets/media/svg/illustrations/easy/1-dark.svg"
                                            class="theme-dark-show w-200px" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
