@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('info'))
                    <div class="alert alert-danger">
                        {{ session('info') }}
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
                                @if(isset(auth()->user()->role->permission['name']['notice']["can-delete"]))
                                <a href="#"data-toggle="modal" data-target="#exampleModal{{ $notice->id }}"class="btn btn-danger">
                                    Delete
                                </a>
                                @endif
                                <div class="modal fade" id="exampleModal{{ $notice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{ route('notices.destroy',[$notice->id]) }}"method="POST">
                                      @csrf
                                      @method('DELETE')
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Are you sure you want to delete?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                                @if(isset(auth()->user()->role->permission['name']['notice']["can-edit"]))
                                <a href="{{ route('notices.edit',[$notice->id]) }}"
                                   class="btn btn-info">
                                   Edit
                                </a>
                                @endif
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

