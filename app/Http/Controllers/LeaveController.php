<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();
        return view('admin.leaves.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();
        return view('admin.leaves.create',compact('leaves'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveRequest $request)
    {
        //
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message'] = '';
        $data['status'] = 0;
        Leave::create($data);
        return redirect('leaves/create')->with('message','Leave Requested Completed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $leaves = Leave::latest()->get();
        return view('admin.leaves.show',compact('leaves'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $leave = Leave::find($id);
        return view('admin.leaves.edit',compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveRequest $request, $id)
    {
        //
        $data = $request->all();
        $leave = Leave::find($id);
        $leave['user_id'] = auth()->user()->id;
        $leave['message'] = '';
        $leave['status'] = 0 ;
        $leave->update($data);

        return redirect('leaves/create')->with('message','Leave Form Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accept(Request $request,Leave $leave)
    {
        $leave->status = config('leave.leave_status.accept');
        $leave->message = $request->message;
        $leave->save();
        return redirect('/leaves')->with('message','Leave Approved Successfully');
    }

    public function reject(Request $request,Leave $leave)
    {
        $leave->status = config('leave.leave_status.reject');
        $leave->message = $request->message;
        $leave->save();
        return redirect('/leaves')->with('message','Leave Rejected Successfully');
    }
}
