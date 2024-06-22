@extends('admin.template.main')

@section('title', 'Employees - StaffConnect')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Employee Data</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Employee</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-secondary" id="bt-download"
                        onclick="window.location='{{ route('admin-employeeexport') }}'">
                        Download
                    </button>
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        Add Employee
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
                                    <table id="employeeTable"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead>
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adress</th>
                                                <th>Birthdate</th>
                                                <th>Departement</th>
                                                <th>Position</th>
                                                <th>Level</th>
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
    {{-- Modal Add Employee --}}
    <div id="modalAdd" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalAddLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add New Employee</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-employeecreate') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Employee Name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter the employee name" id="addName" name="name">
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Employee Email</span>
                                </label>
                                <input type="email" class="form-control form-control-solid"
                                    placeholder="Enter the employee email" id="addEmail" name="email">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Employee Phone</span>
                                </label>
                                <input type="number" class="form-control form-control-solid"
                                    placeholder="Enter the employee phone" id="addPhone" name="phone">
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Employee Address</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter the employee address" id="addAddress" name="address">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Birthdate</label>
                            <div class="position-relative d-flex align-items-center">
                                <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                                <input type="date" class="form-control form-control-solid ps-12"
                                    placeholder="Select the employee birthdate" id="addBirthdate" name="birthdate" />
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Departement</label>
                            <select class="form-select form-select-solid"
                                data-placeholder="Select the employee departement" data-hide-search="true"
                                id="addDepartement" name="departement_name">
                                <option value="" selected disabled>Select the employee departement</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Position</label>
                            <select class="form-select form-select-solid" data-placeholder="Select the employee position"
                                data-hide-search="true" id="addPosition" name="position_title">
                                <option value="" selected disabled>Select the employee position</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->title }} - {{ $position->level }}
                                    </option>
                                @endforeach
                            </select>
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

    {{-- Modal Edit Employee --}}
    <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Employee</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-employeeupdate') }}" method="PUT">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Employee Name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="" id="updateName" name="name">
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Employee Email</span>
                                </label>
                                <input type="email" class="form-control form-control-solid"
                                    placeholder="" id="updateEmail" name="email">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Employee Phone</span>
                                </label>
                                <input type="number" class="form-control form-control-solid"
                                    placeholder="" id="updatePhone" name="phone">
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Employee Address</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="" id="updateAddress" name="address">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Birthdate</label>
                            <div class="position-relative d-flex align-items-center">
                                <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                                <input type="date" class="form-control form-control-solid ps-12"
                                    placeholder="" id="updateBirthdate" name="birthdate" />
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Departement</label>
                            <select class="form-select form-select-solid"
                                data-placeholder="" data-hide-search="true"
                                id="updateDepartement" name="departement_name">
                                <option value="" selected disabled>Select the employee departement</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Position</label>
                            <select class="form-select form-select-solid" data-placeholder=""
                                data-hide-search="true" id="updatePosition" name="position_title">
                                <option value="" selected disabled>Select the employee position</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->title }} - {{ $position->level }}
                                    </option>
                                @endforeach
                            </select>
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

    {{-- Modal Detail --}}
    <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Employee Detail</h2>
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
                                <span>Employee name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailName"
                                readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Employee Email</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailEmail" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Employee Phone</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailPhone" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Employee Address</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailAddress" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Employee Birthdate</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailBirthdate" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Employee Departement</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailDepartementName" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Departement Description</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailDepartementDescription" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Employee Position</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailPositionTitle" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Employee Level</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailPositionLevel" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Position Description</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailPositionDescription" readonly>
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
        // Yajra DataTable Employee
        $(document).ready(function() {
            tabel = $('#employeeTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-employeedata') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
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
                        data: 'phone',
                        name: 'phone',
                        orderable: true,
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
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'birthdate',
                        name: 'birthdate',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            let date = new Date(data);
                            let formattedDate = date.toLocaleDateString('en-GB');
                            return `<span class="text-gray-900 fw-bold fs-8">${formattedDate}</span>`;
                        }
                    },
                    {
                        data: 'departement_name',
                        name: 'departement_name',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: 'position_title',
                        name: 'position_title',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: 'position_level',
                        name: 'position_level',
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
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                        <a onclick="modalDetail('${row.name}', '${row.email}', '${row.phone}', '${row.address}', '${row.birthdate}', '${row.departement_name}', '${row.position_title}', '${row.position_level}', '${row.departement_description}', '${row.position_description}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                            <i class="ki-duotone ki-note-2 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <a onclick="modalEdit('${row.id}', '${row.name}', '${row.email}', '${row.phone}', '${row.address}', '${row.birthdate}', '${row.departement_id}', '${row.position_id}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalEdit">
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
        function modalDetail(name, email, phone, address, birthdate, departement_name, position_title, position_level,
            departement_description, position_description) {
            $('#detailName').val(name);
            $('#detailEmail').val(email);
            $('#detailPhone').val(phone);
            $('#detailAddress').val(address);
            // Format birthdate to dd/mm/yy
            let date = new Date(birthdate);
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let year = String(date.getFullYear());
            let formattedBirthdate = `${day}/${month}/${year}`;
            $('#detailBirthdate').val(formattedBirthdate);
            $('#detailDepartementName').val(departement_name);
            $('#detailDepartementDescription').val(departement_description);
            $('#detailPositionTitle').val(position_title);
            $('#detailPositionLevel').val(position_level);
            $('#detailPositionDescription').val(position_description);
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
                        'Employee has been added.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error adding Employee: ' + xhr.responseJSON.message,
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
                    fetch(`/admin/employee-delete/${id}`, {
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
        function modalEdit(id, name, email, phone, address, birthdate, departement_id, position_id) {
            $('#id').val(id);
            $('#updateName').val(name);
            $('#updateEmail').val(email);
            $('#updatePhone').val(phone);
            $('#updateAddress').val(address);
            $('#updateBirthdate').val(birthdate);
            $('#updateDepartement').val(departement_id);
            $('#updatePosition').val(position_id);
            $('#modalEdit').modal('show');
        }
    </script>
@endpush

@push('style')
    <style>
        /* Table Adjusment */
        #employeeTable td,
        #employeeTable th {
            text-align: center;
            white-space: nowrap;
        }

        #employeeTable th {
            font-weight: bold;
        }

        /* Remove Sort Button First Column */
        #employeeTable thead th:first-child {
            cursor: default;
        }

        #employeeTable thead th:first-child::after,
        #employeeTable thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #employeeTable td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
