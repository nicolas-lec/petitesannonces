<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){return view('home');}


    public function admin(){return view('users.admin');}


    public function updateUser (){

        $user = Auth::user();

    return view('auth.update', compact('user'));
    }

    public function showU ($id){

        $users = User::findOrFail($id);


        return view('auth.show', compact('users'));

    }

    //MàJ d'un profil
    public function updateU(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect()->route('home');
    }

    //Supprime un user
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('home');
    }


}
