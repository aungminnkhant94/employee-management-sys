@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if(count($notices) > 0)
                <div class="container ">
                    @foreach($notices as $notice)
                        <div class="card border-info mb-2 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">{{ $notice->title }}</h5>

                                <div class="card-subtitle mb-2 text-muted small">
                                    {{ $notice->created_at->diffForHumans() }} <br>
                                    Created By <b>{{ $notice->name }}
                                </div>
                                <p class="card-text ">
                                    {{ $notice->description }}
                                </p>
                                <a href="{{ route('notices.destroy',[$notice->id]) }}" 
                                   class="btn btn-danger">
                                    Delete
                                </a>
                                <a href="{{ route('notices.edit',[$notice->id]) }}"
                                   class="btn btn-info">
                                   Edit
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                
                @else
                <p>There is No Notice.</p>
                @endif
            </div>
        </div>
    </div>
@endsection