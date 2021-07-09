@extends ('admin.layouts.master')

@section ('content')
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"aria-current="page">
                    Leave Form
                </li>
            </ol>
        </nav>
        
        <form action="{{ route('leaves.update',[$leave->id]) }}"method="POST">
            @csrf   
            @method('PATCH')
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Edit Leave Form
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Start From</label>
                                <input type=""name="from"id="datepicker" class="form-control @error('from') is-invalid @enderror"value="{{ $leave->from }}" required>
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">End in</label>
                                <input type=""name="to"id="datepicker1"class="form-control @error('to') is-invalid @enderror"value="{{ $leave->to }}"required>
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Type of Leave</label>
                                <select class="form-control" name="type" id=""required>
                                        <option value="annualleave">Annual Leave</option>
                                        <option value="sickleave">Sick Leave</option>
                                        <option value="parentalleave">Parental Leave</option>
                                        <option value="other">Other Leave</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">{{ $leave->description }}</textarea>    
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit"class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
    </div>
@endsection