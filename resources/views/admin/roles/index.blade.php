@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"aria-current="page">All Roles</li>
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
                            <th>Role Name</th>
                            <th>Description</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(
                            count($roles) > 0
                        )
                        @foreach($roles as $cap => $role)
                        <tr>
                            <td>{{ $cap+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a href="{{ route('roles.destroy',[$role->id]) }}"data-toggle="modal" data-target="#exampleModal{{ $role->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <!--Bootstrap Modal-->
                                <div class="modal fade" id="exampleModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{ route('roles.destroy',[$role->id]) }}"method="POST">
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
                            <td>
                                <a href="{{ route('roles.edit',[$role->id]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td>No roles to show</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection