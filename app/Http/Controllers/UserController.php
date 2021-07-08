<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        $data = $request->all();
        if($request->hasFile('image')) {
            $image = $request->image->hashName();
            //$image = $request->file('image');
            //$ext = $image->getClientOriginalExtension();
            //$filename = date('YmdHis') . "." . $ext;
            $request->image->move(public_path('avatar'),$image);
        } else {
            $image = 'avatar.jpeg';
        }
        $data['image'] = $image;
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect('/users')->with('message','User Created Successfully');
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
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
        $data = $request->all();
        $user = User::find($id);

        if($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('avatar'),$image);
        }else{
            $image = $user->image;
        }

        if($request->password) {
            $password = $request->password;
            //$data['password'] = bcrypt($request->password);
        }else{
            $password = $user->password;
        }
        $data['image'] = $image;
        $data['password'] = bcrypt($password);
        $user->update($data);
        return redirect('/users')->with('message','User Updated Successfully');
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
        User::find($id)->delete();
        return redirect('/users')->with('message','User Deleted Successfully');
    }
}
