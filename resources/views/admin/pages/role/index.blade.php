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
                            <h3 class="mb-0  text-white">Data Role</h3>
                        </div>
                        <div>
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-white">Tambah Role</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-6">
                <!-- card -->
                <div class="card ">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- striped rows -->
                        <x-alert />
                        <form action="{{ route('admin.roles.index') }}" method="get">
                            <div class="d-flex justify-content-end mt-4">
                                <div class="input-group w-100 w-md-30 mb-3">
                                    <input type="text" name="search" class="form-control" placeholder="Pencarian"
                                        value="{{ request()->search }}">
                                    <button class="input-group-text" id="basic-addon2">
                                        <i data-feather="search" class="nav-icon" width="12px"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $key => $role)
                                        <tr>
                                            <th scope="row">{{ $roles->firstItem() + $key }}</th>
                                            <td>{{ $role->role }}</td>
                                            <td>
                                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                                    class="d-flex">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i data-feather="edit" class="nav-icon" width="12px"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i data-feather="trash" class="nav-icon" width="12px"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="99" align="center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $roles->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
