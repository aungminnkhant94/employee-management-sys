<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notices = Notice::latest()->get();
        return view('admin.notices.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticeRequest $request)
    {
        //
        $notice = new Notice;
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->date = $request->date;
        $notice->user_id = auth()->user()->id;
        $notice->name = auth()->user()->name;
        $notice->save();
        //Notice::create($request->all());
        return redirect('/notices')->with('info','Notice Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $notice = Notice::find($id);
        //dd($notice);
        $this->authorize('view',$notice);
        return view('admin.notices.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        //
        $this->authorize('update',$notice);
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->date = $request->date;
        $notice->user_id = auth()->user()->id;
        $notice->name = auth()->user()->name;
        $notice->update();

        return redirect('notices')->with('message','Notices Updated Successfully');
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
        $notice = Notice::find($id);

        $this->authorize('delete',$notice);
        $notice->delete();
        return redirect('/notices')->with('info','Notice Deleted');
    }
}
