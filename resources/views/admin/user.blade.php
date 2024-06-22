@extends('admin.template.main')

@section('title', 'Users - StaffConnect')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        User Data</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">User</li>
                    </ul>
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
                                    <table id="userTable"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead>
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
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
    {{-- Modal Edit User --}}
    <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit User</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-userupdate') }}" method="PUT">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">User Name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="updateName"
                                name="name">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">User Email</span>
                            </label>
                            <input type="email" class="form-control form-control-solid" placeholder="" id="updateEmail"
                                name="email">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">User Status</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="updateStatus" name="status">
                                <option value="" selected disabled>Select the user status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">User Password</span>
                            </label>
                            <input type="password" class="form-control form-control-solid"
                                placeholder="Enter the new user password" id="updatePassword" name="password">
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

    {{-- Modal Detail User --}}
    <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>User Detail</h2>
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
                                <span>User Name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailName"
                                readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>User Email</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailEmail" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>User Status</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailStatus" readonly>
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
        // Yajra DataTable User
        $(document).ready(function() {
            tabel = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-userdata') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<a href="mailto:${data}" class="text-gray-900 fw-bold fs-8 text-hover-primary">${data}</a>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Active') {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-danger">${data}</span>`;
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
                                        <a onclick="modalDetail('${row.name}', '${row.email}', '${row.status}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                            <i class="ki-duotone ki-note-2 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <a onclick="modalEdit('${row.id}', '${row.name}', '${row.email}', '${row.status}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalEdit">
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
        $('#modalEdit').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        // Modal Detil Data
        function modalDetail(name, email, status) {
            $('#detailName').val(name);
            $('#detailEmail').val(email);
            $('#detailStatus').val(status);
            $('#modalDetail').modal('show');
        }

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
                    fetch(`/admin/user-delete/${id}`, {
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
        function modalEdit(id, name, email, status) {
            $('#id').val(id);
            $('#updateName').val(name);
            $('#updateEmail').val(email);
            $('#updateStatus').val(status);
            $('#modalEdit').modal('show');
        }
    </script>
@endpush

@push('style')
    <style>
        /* Table Adjusment */
        #userTable td,
        #userTable th {
            text-align: center;
            white-space: nowrap;
        }

        #userTable th {
            font-weight: bold;
        }

        /* Remove Sort Button First Column */
        #userTable thead th:first-child {
            cursor: default;
        }

        #userTable thead th:first-child::after,
        #userTable thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #userTable td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
