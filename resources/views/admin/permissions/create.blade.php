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

            <form action="{{ route('permissions.store') }}"method="POST">
            @csrf
            <div class="card">
                <div class="card-header">Permission</div>

                <div class="card-body">
                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="">
                        <option value="">Select Role</option>
                        @foreach(App\Models\Role::all() as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </select>
                    <table class="table table-dark table-striped mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Permissions</th>
                                <th scope="col">Permission to <span class="badge badge-secondary">CREATE</span></th>
                                <th scope="col">Permission to <span class="badge badge-secondary">EDIT</span></th>
                                <th scope="col">Permission to <span class="badge badge-secondary">VIEW</span></th>
                                <th scope="col">Permission to <span class="badge badge-secondary">DELETE</span></th>
                                <th scope="col">Permission to <span class="badge badge-secondary">CONTROL</span></th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr>
                                <th>Departments</th>
                                
                                <td><input type="checkbox"name="name[department][can-add]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[department][can-edit]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[department][can-view]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[department][can-delete]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[department][can-control]"value="1"id="permissions"></td>
                            </tr>
                            <tr>
                                <th>Roles</th>
                                <td><input type="checkbox"name="name[role][can-add]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[role][can-edit]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[role][can-view]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[role][can-delete]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[role][can-control]"value="1"id="permissions"></td>
                            </tr>
                            <tr>
                                <th>Permissions</th>
                                <td><input type="checkbox"name="name[permission][can-add]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[permission][can-edit]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[permission][can-view]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[permission][can-delete]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[permission][can-control]"value="1"id="permissions"></td>
                            </tr>
                            <tr>
                                <th>Users</th>
                                <td><input type="checkbox"name="name[user][can-add]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[user][can-edit]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[user][can-view]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[user][can-delete]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[user][can-control]"value="1"id="permissions"></td>
                            </tr>
                            <tr>
                                <th>Notices</th>
                                <td><input type="checkbox"name="name[notice][can-add]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[notice][can-edit]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[notice][can-view]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[notice][can-delete]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[notice][can-control]"value="1"id="permissions"></td>
                            </tr>
                            <tr>
                                <th>Approve Leave</th>
                                <td><input type="checkbox"name="name[leave][can-add]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[leave][can-edit]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[leave][can-view]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[leave][can-delete]"value="1"id="permissions"></td>
                                <td><input type="checkbox"name="name[leave][can-control]"value="1"id="permissions"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit"class="btn btn-success">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
