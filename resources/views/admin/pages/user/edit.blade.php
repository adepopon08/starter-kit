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
                            <h3 class="mb-0  text-white">Edit Data User</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-6">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->

                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="textInput">Nama</label>
                                <input type="text" name="name" id="textInput"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ?? $user->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') ?? $user->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" value="">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="selectOne">Level</label>
                                <select class="form-select @error('role_id') is-invalid @enderror" name="role_id"
                                    aria-label="Default select example">
                                    @foreach ($roles as $role)
                                        <option @selected($role->id == $user->role_id) value="{{ $role->id }}">{{ $role->role }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary ml-4">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
