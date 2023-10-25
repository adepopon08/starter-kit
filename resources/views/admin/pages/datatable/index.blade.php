@extends('admin.layouts.master')
@section('content')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white">Data User</h3>
                        </div>
                        <div>
                            <a href="{{ route('admin.user.create') }}" class="btn btn-white">Tambah User</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-6">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-body">
                        <x-alert />
                        <div class="table-responsive">
                            <table id="datatable-server" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- table  -->

                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var dt = $('#datatable-server').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.datatable.lists') }}",
                language: {
                    processing: "Memuat...  ",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role.role',
                        name: 'role_id'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }
                ]
            });
        });
    </script>
@endpush
