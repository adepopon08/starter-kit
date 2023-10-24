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
                        <form action="{{ route('admin.user.index') }}" method="get">
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
                            <table class="table text-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Nama</th>
                                        <th>e-Mail</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <th scope="row">{{ $users->firstItem() + $key }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->role }}</td>
                                            <td>

                                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                                    class="d-flex">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i data-feather="edit" class="nav-icon" width="12px"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure delete this data?')">
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
                            {{ $users->withQueryString()->links() }}
                        </div>
                    </div>
                    <!-- table  -->

                </div>

            </div>
        </div>
    </div>
@endsection
