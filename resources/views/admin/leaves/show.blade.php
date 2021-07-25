@extends ('admin.layouts.master')

@section ('content')
<div class="container-fluid mt-5">
<h3 class="mt-5">Employee Leaves</h3>
<table class="table table-striped table-bordered mt-5">
    <tr >
        <th>Number</th>
        <th>Name</th>
        <th>Start From</th>
        <th>End in</th>
        <th>Description</th>
        <th>Type</th>
        <th >Reply</th>
        <th>Status</th>
        <th>Approve / Reject</th>
    </tr>
     @foreach ($leaves as $cap => $leave)
    <tr>
        <td>{{ $cap+1 }}</td>
        <td>{{ $leave->user->name }}</td>
        <td>{{ $leave->from }}</td>
        <td>{{ $leave->to }}</td>
        <td>{{ $leave->description }}</td>
        <td>{{ $leave->type }}</td>
        <td>{{ $leave->message }}</td>
        <td>
            @if($leave->status == 0)
            <span class="alert alert-warning">Pending</span>
            @elseif($leave->status == 2)
            <span class="alert alert-danger">Rejected</span>
            @else
            <span class="alert alert-success">Success</span>
            @endif
        </td>
       
        <td>
        @if($leave->status == 0)
            <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#exampleModal{{ $leave->id }}">
                Approve
            </a>
            <a href="#" class="btn btn-danger"data-toggle="modal" data-target="#rejectModal{{ $leave->id }}">
                Reject
            </a>
        @else 
            <span class="alert alert-info mt-5">This leave is already approved.</span>
        @endif
            <!--Bootstrap Modal-->
            <div class="modal fade" id="exampleModal{{ $leave->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
              <form action="/leaves/{{ $leave->id }}/accept"method="POST">
                  @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write Confirmation Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message"class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Submit</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!--End Modal--> 
          <!--Reject Modal-->
          <div class="modal fade" id="rejectModal{{ $leave->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="/leaves/{{ $leave->id }}/reject"method="POST">
                @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="rejectModalLabel">Write Rejection Reason</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      <label for="message">Message</label>
                      <textarea name="message"class="form-control"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-warning">Submit</button>
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