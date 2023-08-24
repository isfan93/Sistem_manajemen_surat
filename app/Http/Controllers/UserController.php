<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function user_all()
    {
        $user = User::all();
        return view('user', ['user' => $user]);
    }

    public function add_user(Request $req)
    {
        $this->validate($req,[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'role' => $req->role,
            'password' => Hash::make($req->password),
            
        ]);
        Alert::success('data berhasil disimpan');
        return redirect('/user');

    }

    public function update_user($id, Request $req)
    {
        $user = User::find($id);

        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->role = $req->role;
        $user->password = Hash::make($req->password);
        $user->save();

        Alert::success('Data berhsail di update');
        return redirect('/user');
    }

    public function hapus_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
