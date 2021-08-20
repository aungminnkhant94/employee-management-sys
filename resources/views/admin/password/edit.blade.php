@extends ('admin.layouts.master')

@section ('content')
 @error('current_password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>                            
 @enderror
<div class="container mt-5">
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{route('profile.change.password')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf   
                <div class="card ">
                    <div class="card-body">
                        <h4 class="card-title">
                            <h4>Change Password</h4>
                        </h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-3">
                                    <label for="current_password">Old password</label>
                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                        placeholder="Enter current password">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="new_password ">New password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                        placeholder="Enter the new password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="confirm_password">Confirm your new password</label>
                                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="Enter same password">
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit"class="btn btn-primary"id="formSubmit">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>       
    </form>
    </div>


@endsection