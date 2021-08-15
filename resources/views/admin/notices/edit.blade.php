@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-10">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ol>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
            <form action="{{ route('notices.edit') }}"method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">Edit Notices</div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text"name="title"class="form-control @error('title') is-invalid @enderror"value="{{ $notice->title }}">
                        @error('title')
                            <span class="invalid-feedback"role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden"value="auth()->user()->id"name="user_id">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" class="form-control">
                            {{ $department->description }}
                        </textarea>
                        @error('description')
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
                        <label for="">Date </label>
                        <input type=""name="date"id="datepicker" class="form-control @error('date') is-invalid @enderror"value="{{ $notice->date }}"required>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Created By</label>
                        <input type=""name="name" class="form-control @error('name') is-invalid @enderror"value="{{ auth()->user()->name }}" required>
                        @error('name')
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
            </form>
        </div>
    </div>
</div>
@endsection
