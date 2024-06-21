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
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xl-3">
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                            style="background-color: #F1416C;background-image:url('assets/media/svg/shapes/wave-bg-red.svg')">
                            <div class="card-header pt-5 mb-3">
                                <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                    style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                                    <i class="ki-duotone ki-profile-user text-white fs-2qx lh-0">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="card-body d-flex align-items-end mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="fs-4hx text-white fw-bold me-6" data-kt-countup="true"
                                        data-kt-countup-value="{{ $totalEmployees }}">0</span>
                                    <div class="fw-bold fs-6 text-white">
                                        <span class="d-block">Total</span>
                                        <span class="">Employees</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                            style="background-color: #7239EA;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                            <div class="card-header pt-5 mb-3">
                                <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                    style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
                                    <i class="ki-duotone ki-crown-2 text-white fs-2qx lh-0">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="card-body d-flex align-items-end mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="fs-4hx text-white fw-bold me-6" data-kt-countup="true"
                                        data-kt-countup-value="{{ $totalPositions }}">0</span>
                                    <div class="fw-bold fs-6 text-white">
                                        <span class="d-block">Total</span>
                                        <span class="">Positions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card card-flush overflow-hidden h-lg-100">
                            <div class="card-header pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">Number of employees</span>
                                    <span class="text-gray-500 mt-1 fw-semibold fs-6">per department</span>
                                </h3>
                            </div>
                            <div class="card-body d-flex justify-content-center align-items-center p-0">
                                <div id="departementChart">
                                    <input type="hidden" id="departementChartData"
                                        value="{{ json_encode($employeeDepartements) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xl-8">
                        <div class="card card-flush h-lg-100">
                            <div class="card-header pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">New Employees</span>
                                    <span class="text-gray-500 mt-1 fw-semibold fs-6">filtered 3 new employees</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dashboardTable"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead>
                                            <tr class="fw-bold text-muted">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adress</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card h-lg-100" style="background: linear-gradient(112.14deg, #FF8A00 0%, #E96922 100%)">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-sm-7 pe-0 mb-5 mb-sm-0">
                                        <div
                                            class="d-flex justify-content-between h-100 flex-column pt-xl-5 pb-xl-5 ps-xl-7">
                                            <div class="mb-7">
                                                <div class="mb-6">
                                                    <h3 class="fs-2 fw-bold text-white">Get started now!</h3>
                                                    <span class="fw-semibold fs-6 text-white opacity-75">Record employee
                                                        data
                                                        effortlessly with Staff Connect!</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <img src="assets/media/svg/illustrations/easy/7.svg" class="h-200px h-lg-250px"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Yajra DataTable Dashboard
        $(document).ready(function() {
            tabel = $('#dashboardTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-dashboarddata') }}",
                columns: [{
                        data: 'name',
                        name: 'name',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<a href="mailto:${data}" class="text-gray-900 fw-bold fs-8 text-hover-primary">${data}</a>`;
                        }
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        orderable: false,
                        render: function(data, type, row) {
                            let phoneNumber = data.replace(/\D/g, '');
                            return '<a href="https://wa.me/' + phoneNumber +
                                '" target="_blank" class="text-gray-900 fw-bold fs-8 text-hover-primary">' +
                                data + '</a>';
                        }
                    },
                    {
                        data: 'address',
                        name: 'address',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                ],
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                iDisplayLength: 10,
                responsive: true,
            });
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });
    </script>
@endpush

@push('style')
    <style>
        /* Table Adjusment */
        #dashboardTable td,
        #dashboardTable th {
            text-align: center;
            white-space: nowrap;
        }

        #dashboardTable th {
            font-weight: bold;
        }

        /* Remove Sort Button First Column */
        #dashboardTable thead th:first-child {
            cursor: default;
        }

        #dashboardTable thead th:first-child::after,
        #dashboardTable thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #dashboardTable td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
