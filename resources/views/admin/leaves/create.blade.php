@extends ('admin.layouts.master')

@section ('content')
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"aria-current="page">
                    Leave Form
                </li>
            </ol>
        </nav>
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('leaves.store') }}"method="POST">
            @csrf   
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Create Leave Form
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Start From</label>
                                <input type=""name="from"id="datepicker" class="form-control @error('from') is-invalid @enderror"required>
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">End in</label>
                                <input type=""name="to"id="datepicker1"class="form-control @error('to') is-invalid @enderror"required>
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Type of Leave</label>
                                <select class="form-control" name="type" id=""required>
                                        <option value="annualleave">Annual Leave</option>
                                        <option value="sickleave">Sick Leave</option>
                                        <option value="parentalleave">Parental Leave</option>
                                        <option value="other">Other Leave</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control"></textarea>    
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit"class="btn btn-primary">Submit</button>
                                <a href="{{ route('leaves.recent') }}"class="btn btn-dark"style="float:right;">View Your Recent Leaves</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <h3 class="mt-5">Your Leave History</h3>
        <table class="table table-striped table-bordered mt-5">
            <tr>
                <th>Number</th>
                <th>Start From</th>
                <th>End in</th>
                <th>Description</th>
                <th>Type</th>
                <th>Reply</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
             @foreach ($leaves as $cap => $leave)
            <tr>
                <td>{{ $cap+1 }}</td>
                <td>{{ $leave->from }}</td>
                <td>{{ $leave->to }}</td>
                <td>{{ $leave->description }}</td>
                <td>{{ $leave->type }}</td>
                <td>{{ $leave->message }}</td>
                <td>
                    @if($leave->status == 0)
                    <span class="alert alert-warning mt-5">Pending</span>
                    @else
                    <span class="alert alert-warning mt-5">Success</span>
                    @endif
                </td>
                <td><a href="{{ route('leaves.edit',[$leave->id]) }}"><i class="fas fa-edit"></i></a></td>
                <td>
                    <a href="#"data-toggle="modal" data-target="#exampleModal{{ $leave->id }}">
                        <i class="fas fa-trash"></i>
                    </a>

                    <!--Bootstrap Modal-->
                    <div class="modal fade" id="exampleModal{{ $leave->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form action="{{ route('leaves.destroy',[$leave->id]) }}"method="POST">
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

                @endforeach
            </tr>
        </table>
    </div>
@endsection