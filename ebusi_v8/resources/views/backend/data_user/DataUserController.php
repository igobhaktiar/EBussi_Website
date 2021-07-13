<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Alert;
use DataTables;


class DataUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data_user = DB::table('users')->simplePaginate(10);
        return view('backend.data_user.index', compact('data_user'));
    }

    public function cetak_user(){
        $data_user_cetak = User::get();
        return view('backend.data_user.cetak_user', compact('data_user_cetak'));
    }

    public function delete($id){
        // return "delete";
        $data_user = User::where('id', $id)->first();
        $data_user->delete();
        return redirect('user-index')->with('success', 'Data User berhasil dihapus');
    }

    public function create(){
        $data_user = null;
        return view('backend.data_user.create_user', compact('data_user'));
    }

    public function store(Request $request){
        $input = $request->all();
        $request->validate([
            'name' => 'required|string|max:30',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:20',
            'nohp' => 'required|numeric',
            // 'foto_user' => 'required|image',          
            'alamat' => 'required',
            'is_admin' => 'required'
        ]);

        // $imgUser = $request->foto_user->getClientOriginalName() . '-' . time() 
        // . '.' .   $request->foto_user->extension();
        
        // $request->foto_user->move(public_path('upload_foto_user'), $imgUser);
        // $request->user()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'is_admin' => $request->is_admin
            // 'foto_user' => $imgUser        
        ]);

        

        alert()->success('Data User berhasil disimpan', 'Success');
        return redirect('user-index');

    }

    // protected function store(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'is_admin' => $data['is_admin'],
    //         'password' => Hash::make($data['password']),
    //         'alamat' =>  $data['alamat'],
    //         'nohp' => $data['nohp']
    //     ]);
    // }

    //edit
    public function edit($id){
        $data_user = User::find($id);
        return view('backend.data_user.edit', compact('data_user'));
        // $produks = Produk::where('id', $id)->first();
        // return view('backend.produk.create', compact('produks'));
    }

    public function update(Request $request, $id){
       

        User::find($id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'is_admin' => $request->is_admin
        ]);

        
        
        $data_user = User::where('id', $id)->first();
        $data_user->update();
        alert()->success('Data User berhasil diubah', 'Success');
        return redirect('user-index');
       
    }
    // end terkait pereditan
    public function detail($id){
        $detailuser = User::get();
        return view('backend.data_user.detail', compact('detailuser'));
    }
}
