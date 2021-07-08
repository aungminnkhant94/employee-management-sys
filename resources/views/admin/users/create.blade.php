@extends ('admin.layouts.master')

@section ('content')
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"aria-current="page">
                    Register Employee
                </li>
            </ol>
        </nav>
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('users.store') }}"method="POST"enctype="multipart/form-data">
            @csrf   
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            General Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text"name="name"class="form-control @error('name') is-invalid @enderror"required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text"name="address"class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="number"name="mobile_number"class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label for="">Department</label>
                                <select class="form-control" name="department_id" id=""required>
                                    <option value="">Select Department</option>
                                    @foreach(App\Models\Department::all() as $dep)
                                        <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text"name="designation"class="form-control @error('designation') is-invalid @enderror"required>
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type=""name="start_from"id="datepicker" class="form-control  @error('start_from') is-invalid @enderror"placeholder="dd-mm-yyyy"required>
                                @error('start_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file"name="image"class="form-control @error('image') is-invalid @enderror"accept="image/*">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">Login Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email"name="email"class="form-control @error('email') is-invalid @enderror"required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password"name="password"class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="form-control" name="role_id" id=""required>
                                    <option value="">Select Role</option>
                                    @foreach(App\Models\Role::all() as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit"class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection