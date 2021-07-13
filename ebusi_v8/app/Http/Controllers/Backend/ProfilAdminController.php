<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Alert;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('backend.profile_admin.index', compact('user'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'password' => 'confirmed',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password); 
        }

        $user->update();
        alert()->success('Data profile sukses di update', 'Success');
        return redirect('profile-admin');
        

    }
}


