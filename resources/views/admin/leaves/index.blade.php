@extends ('admin.layouts.master')

@section ('content')
<div class="container-fluid mt-5">
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
            <span class="alert alert-success mt-5">Success</span>
            @endif
        </td>
        <td>
        @if($leave->status == 0)
          <a href="{{ route('leaves.edit',[$leave->id]) }}"><i class="fas fa-edit"></i></a>
        @else
          <span class="alert alert-info mt-5">Your leave is already approved.</span>
        @endif
        </td>
        <td>
        @if($leave->status == 0)
            <a href="#"data-toggle="modal" data-target="#exampleModal{{ $leave->id }}">
                <i class="fas fa-trash"></i>
            </a>
        @else
        <span class="alert alert-info mt-5">Your leave is already approved.</span>
        @endif
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