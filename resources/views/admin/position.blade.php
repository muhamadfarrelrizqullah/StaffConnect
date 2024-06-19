@extends('admin.template.main')

@section('title', 'Positions - StaffConnect')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Position Data</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Position</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-secondary" id="bt-download"
                        onclick="window.location='{{ route('admin-positionexport') }}'">
                        Download
                    </button>
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        Add Position
                    </button>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="positionTable"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead>
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Level</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    {{-- Modal Add Position --}}
    <div id="modalAdd" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalAddLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add New Position</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-positioncreate') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Position Title</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter the position title" id="addTitle" name="title">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Level</label>
                            <select class="form-select form-select-solid" data-placeholder="Select the position level"
                                data-hide-search="true" id="addLevel" name="level">
                                <option value="" selected disabled>Select the position level</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Position Description</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter the position description" id="addDescription" name="description">
                        </div>
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Discard</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Position --}}
    <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Position</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-positionupdate') }}" method="PUT">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Position Title</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="" id="updateTitle" name="title">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Level</label>
                            <select class="form-select form-select-solid" data-placeholder=""
                                data-hide-search="true" id="updateLevel" name="level">
                                <option value="" selected disabled>Select the position level</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Position Description</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="" id="updateDescription" name="description">
                        </div>
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Discard</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Detail Position --}}
    <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Position Detail</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="#">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Position Title</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailTitle" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Position Level</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailLevel" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Position Description</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailDescription" readonly>
                        </div>
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Discard</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Yajra DataTable Position
        $(document).ready(function() {
            tabel = $('#positionTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-positiondata') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'title',
                        name: 'title',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'level',
                        name: 'level',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Manager') {
                                return `<span class="badge badge-light-warning">${data}</span>`;
                            } else if (data === 'Senior') {
                                return `<span class="badge badge-light-primary">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'description',
                        name: 'description',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                            } else {
                                return `<span class="text-gray-900">...</span>`;
                            }
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                        <a onclick="modalDetail('${row.title}', '${row.level}', '${row.description}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                            <i class="ki-duotone ki-note-2 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <a onclick="modalEdit('${row.id}', '${row.title}', '${row.level}', '${row.description}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                            <i class="ki-duotone ki-pencil fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <a onclick="deleteData(${row.id})" class="btn btn-icon btn-bg-light btn-active-color-danger btn-xl">
                                            <i class="ki-duotone ki-trash fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                        </a>
                                    </div>`;
                        }
                    }
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

        // Discard Modal
        $('#modalAdd').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $('#addLevel').val('');
        });

        // Modal Detil Data
        function modalDetail(title, level, description) {
            $('#detailTitle').val(title);
            $('#detailLevel').val(level);
            $('#detailDescription').val(description);
            $('#modalDetail').modal('show');
        }

        // Modal Add Process
        $('#modalAdd form').on('submit', function(e) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            e.preventDefault();
            let data = $(this).serialize();
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: data,
                success: function(response) {
                    console.log(response);
                    $('#modalAdd').modal('hide');
                    tabel.ajax.reload();
                    swalMixinSuccess.fire(
                        'Success!',
                        'Position has been added.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error adding Position: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });

        // Delete Data Process
        function deleteData(id) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/position-delete/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Deleted:', data);
                            tabel.ajax.reload();
                            swalMixinSuccess.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            );
                        })
                        .catch(error => {
                            console.error('Error deleting data:', error);
                            Swal.fire(
                                'Error!',
                                'Error deleting data: ' + error.message,
                                'error'
                            );
                        });
                }
            });
        }

        // Modal Edit Process
        $('#modalEdit form').on('submit', function(e) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            e.preventDefault();
            let data = $(this).serialize();
            let form = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save the changes?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        type: "PUT",
                        data: data,
                        success: function(response) {
                            console.log(response);
                            $('#modalEdit').modal('hide');
                            tabel.ajax.reload();
                            swalMixinSuccess.fire(
                                'Saved!',
                                'Your data has been updated.',
                                'success'
                            );
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON.message);
                            Swal.fire(
                                'Error!',
                                'Error updating data: ' + xhr.responseJSON.message,
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Modal Edit Data
        function modalEdit(id, title, level, description) {
            $('#id').val(id);
            $('#updateTitle').val(title);
            $('#updateLevel').val(level);
            $('#updateDescription').val(description);
            $('#modalEdit').modal('show');
        }
    </script>
@endpush

@push('style')
    <style>
        /* Table Adjusment */
        #positionTable td,
        #positionTable th {
            text-align: center;
            white-space: nowrap;
        }

        #positionTable th {
            font-weight: bold;
        }

        /* Remove Sort Button First Column */
        #positionTable thead th:first-child {
            cursor: default;
        }

        #positionTable thead th:first-child::after,
        #positionTable thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #positionTable td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
