@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"aria-current="page">All Permissions</li>
                    </ol>
                </nav>
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(
                            count($permissions) > 0
                        )
                        @foreach($permissions as $cap => $per)
                        <tr>
                            <td>{{ $cap+1 }}</td>
                            <td>{{ $per->role->name }}</td>
                            <td>
                            @if(isset(auth()->user()->role->permission['name']['permission']["can-edit"]))
                                <a href="{{ route('permissions.edit',[$per->id]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif
                            </td>
                            <td>
                            @if(isset(auth()->user()->role->permission['name']['permission']["can-delete"]))
                                <a href="#"data-toggle="modal" data-target="#exampleModal{{ $per->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            @endif
                                <!--Bootstrap Modal-->
                                <div class="modal fade" id="exampleModal{{ $per->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{ route('permissions.destroy',[$per->id]) }}"method="POST">
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
                                <!--End Modal-->
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Permissions to show</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection