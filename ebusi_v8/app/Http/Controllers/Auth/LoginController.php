<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string', //Validasi kolom username
            //Tapi kolom ini bisa berisi email atau username
            'password' => 'required|string|min:6',
        ]);

        //Lakukan pengecekan, jika inputan dari username formatnya adalah email,
        //maka kita akan melakukan proses authentication menggunakan email, selain itu 
        //akan menggunakan username
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        //tampung informasi loginnya, dimana kolom type pertama bersifat dinamis
        //berdasarkan value dari pengecekan diatas
        $login = [
            $loginType => $request->username,
            'password' => $request->password
        ];

        $input = $request->all();
        //Lakukan login
        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            if(auth()->user()->is_admin == 1){
                return redirect('dashboard');
            } elseif (auth()->user()->is_admin !== 1){
                return redirect('/');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username dan Password salah');
        }

    }
}
