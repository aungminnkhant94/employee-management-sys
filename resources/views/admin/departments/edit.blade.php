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
            <form action="/departments/{{ $department->id }}"method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">Edit Department</div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text"name="name"class="form-control"value="{{ $department->name }}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" class="form-control">
                            {{ $department->description }}
                        </textarea>
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
