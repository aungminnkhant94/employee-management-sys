@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
            <form action="{{ route('departments.store') }}"method="POST">
                @csrf
            <div class="card">
                <div class="card-header">Create New Department</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text"name="name"class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback"role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <span class="invalid-feedback"role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit"class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
