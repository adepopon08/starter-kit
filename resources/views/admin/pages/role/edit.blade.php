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
                            <h3 class="mb-0  text-white">Edit Data Role</h3>
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
                        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">Nama Role</label>
                                <input id="role" type="text" name="role" placeholder="Nama Role"
                                    value="{{ $role->role }}" class="form-control @error('role') is-invalid @enderror">
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary ml-4">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
