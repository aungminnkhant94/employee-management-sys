@extends('admin.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('permissions.update',[$permission->id]) }}"method="POST">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-header">Permission</div>

                <div class="card-body">
                <h3> {{ $permission->role->name }} </h3>
                    <table class="table table-dark table-striped mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Permission</th>
                                <th scope="col">Can Add</th>
                                <th scope="col">Can Edit</th>
                                <th scope="col">Can View</th>
                                <th scope="col">Can Delete</th>
                                <th scope="col">Can Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Departments</th>
                                <td><input type="checkbox"name="name[department][can-add]"@if (isset($departments["can-add"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[department][can-edit]"@if (isset($departments["can-edit"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[department][can-view]"@if (isset($departments["can-view"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[department][can-delete]"@if (isset($departments["can-delete"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[department][can-control]"@if (isset($departments["can-control"])) checked @endif value="1"></td>
                            </tr>
                            <tr>
                                <th>Roles</th>
                                <td><input type="checkbox"name="name[role][can-add]"@if (isset($roles["can-add"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[role][can-edit]"@if (isset($roles["can-edit"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[role][can-view]"@if (isset($roles["can-view"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[role][can-delete]"@if (isset($roles["can-delete"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[role][can-control]"@if (isset($roles["can-control"])) checked @endif value="1"></td>
                            </tr>
                            <tr>
                                <th>Permissions</th>
                                <td><input type="checkbox"name="name[permission][can-add]"@if (isset($permissions["can-add"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[permission][can-edit]"@if (isset($permissions["can-edit"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[permission][can-view]"@if (isset($permissions["can-view"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[permission][can-delete]"@if (isset($permissions["can-delete"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[permission][can-control]"@if (isset($permissions["can-control"])) checked @endif value="1"></td>
                            </tr>
                            <tr>
                                <th>Users</th>
                                <td><input type="checkbox"name="name[user][can-add]"@if (isset($users["can-add"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[user][can-edit]"@if (isset($users["can-edit"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[user][can-view]"@if (isset($users["can-view"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[user][can-delete]"@if (isset($users["can-delete"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[user][can-control]"@if (isset($users["can-control"])) checked @endif value="1"></td>
                            </tr>
                            <tr>
                                <th>Notices</th>
                                <td><input type="checkbox"name="name[notice][can-add]"@if (isset($permission['name']['notice']["can-add"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[notice][can-edit]"@if (isset($permission['name']['notice']["can-edit"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[notice][can-view]"@if (isset($permission['name']['notice']["can-view"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[notice][can-delete]"@if (isset($permission['name']['notice']["can-delete"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[notice][can-control]"@if (isset($permission['name']['notice']["can-control"])) checked @endif value="1"></td>
                            </tr>
                            <tr>
                                <th>Leaves</th>
                                <td><input type="checkbox"name="name[leave][can-add]"@if (isset($permission['name']['leave']["can-add"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[leave][can-edit]"@if (isset($permission['name']['leave']["can-edit"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[leave][can-view]"@if (isset($permission['name']['leave']["can-view"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[leave][can-delete]"@if (isset($permission['name']['leave']["can-delete"])) checked @endif value="1"></td>
                                <td><input type="checkbox"name="name[leave][can-control]"@if (isset($permission['name']['leave']["can-control"])) checked @endif value="1"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit"class="btn btn-success">Update</button>
                    <a href="{{ route('permissions.index') }}"class="btn btn-dark"style="float:right;">Back</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
