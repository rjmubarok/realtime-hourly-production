<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Line;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $remember = $request->input('remember_me');
        if (Auth::attempt($credentials, $remember)) {
            Session::flash('message', "Welcome");
            return redirect()->intended('dashboard');
        }
        Session::flash('message', "Invalid login!");
        return back();
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function userRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);
        Session::flash('message', "Successfully Registered!");
        return back();
    }

    public function userList()
    {
        $users = User::where('id', '!=', Auth::id())->where('id', '!=', '1')
            ->with('floor', 'line')
            ->get();

        return view('auth.userlist', compact('users'));
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }

    public function create()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('auth.create', compact('floors', 'lines'));
    }

    public function userCreate(Request $request)
    {
       // return $request->all();

            try {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                ]);
                $data = [
                    'floor_id' => $request->floor_id,
                    'line_id' => $request->line_id,
                    'user_type' => $request->user_type,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make(123456),
                ];
                User::create($data);
    //            Mail::to('romansarker2015@gmail.com')->send(new UserCreate());
                Session::flash('success', "Created successfully");
                return \redirect()->back();
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
            }


    }

    public function changePass()
    {
        return view('auth.change_password');
    }

    public function updatePassword(Request $request)
    {

        try {
            $request->validate([
                'password' => 'required',
                'new_password' => 'required',
                'new_confirm_password' => ['same:new_password'],
            ]);
            $user = Auth::user();
            $userPassword = $user->password;

            if (!Hash::check($request->password, $userPassword)) {
                return back()->withErrors(['current_password' => ' Your Password not match']);
            }
//            if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
//
//                return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
//            }

            $data = [
                'password' => Hash::make($request->new_password),
            ];

            $pass = User::where('id', $user->id)->update($data);
            return redirect()->route('login')->with("success", "Update successfully. Please Login to continue.");

//            Session::flash('success', "update successfully. Please Login to continue.");
//            return redirect()->route('login');

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function active($id)
    {
        $data = [
            'status' => 1,
        ];
        $updateUserStatus = User::where('id', $id)->update($data);;
        Session::flash('success', "Updated successfully");
        return redirect()->route('user.list');
    }

    public function inactive($id)
    {
        $data = [
            'status' => 0,
        ];
        $updateUserStatus = User::where('id', $id)->update($data);;
        Session::flash('success', "Updated successfully");
        return redirect()->route('user.list');
    }
    public function userEdit($id){
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        if(auth()->user()->user_type=='1'){
            $user=User::find($id);
           return view('auth.edit',compact(['user','floors','lines']));
        }else{
            return back()->with('error','You are not admin');
        }

    }
    public function userUpdate(Request $request, $id){

        if(auth()->user()->user_type=='1'){
            $request->validate([
                'name' => 'required',
                'email' => 'unique:users,email,' . $id,

            ]);
            $data = [
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'user_type' => $request->user_type,
                'name' => $request->name,
                'email' => $request->email,

            ];
         $success=   User::where('id', $id)->update($data);
         if($success){
            return redirect()->route('user.list')->with('success',' Successfully Updated');
         }else{
            Session::flash('error', "Update not possible at this moment !");
         }

        }else{
            return back()->with('error','You are not admin');
        }

    }
}
