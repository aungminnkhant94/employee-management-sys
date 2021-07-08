@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"aria-current="page">All Employee</li>
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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Start Date</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(
                            count($users) > 0
                        )
                        @foreach($users as $cap => $user)
                        <tr>
                            <td>{{ $cap+1 }}</td>
                            <td>
                                <img src="{{ url('/avatar/'.$user->image) }}" alt="user_image"width="60">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge badge-success">{{ $user->role->name }}</span> </td>
                            <td>{{ $user->designation }}</td>
                            <td>{{ $user->department->name ?? 'default' }}</td>
                            <td>{{ $user->start_from }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->mobile_number }}</td>
                            
                            <td>
                                @if(isset(auth()->user()->role->permission['name']['user']["can-delete"]))
                                <a href="#"data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                @endif
                                <!--Bootstrap Modal-->
                                <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{ route('users.destroy',[$user->id]) }}"method="POST">
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
                            @if(isset(auth()->user()->role->permission['name']['user']["can-edit"]))
                                <a href="{{ route('users.edit',[$user->id]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Users to show</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection