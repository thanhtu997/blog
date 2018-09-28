<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Hash,input,Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id','desc')->get();
        return view('admin.user.list',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // $user = User::create($request->all());
        // return response()->json(['data'=>$user],200);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['data'=>$user],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $user = User::find($id)->update($request->all());
        // return response()->json(['data'=>$user],200);
        $user = User::find($id);
        if ($request->input('password')) {
            $password = $request->input('password');
            $user->password = Hash::make($password);
        }
        $user->name = $request->input('name');
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }

    // public function getdangnhapAdmin(){
    //     return view('admin.login');
    // }
    // public function postdangnhapAdmin(LoginRequest $request){
    //     if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
    //         return redirect('admin/home');
    //     }else{
    //         return redirect('admin/dangnhap')->with('error','Đăng Nhập Thất bại!');
    //     }
    // }
}
