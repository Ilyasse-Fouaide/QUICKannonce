<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.main');
    }

    public function showLoginForm()
    {
        return view('auth.main');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'comfirm_password' => 'required|same:password',
            'telephone' => ['required', 'string'],
            'gender' => ['required']
        ]);

        $user = new User();

        $user->username = $request->username;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->telephone = $request->telephone;
        $user->gender = $request->gender;

        $user->save();

        return redirect()->route('auth.showLoginForm')->with('message', 'Inscription réussie ! Vous pouvez maintenant vous connecter pour créer vos propres annonces.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usernamel' => 'required',
            'passwordl' => ['required'],
        ]);

        if (Auth::attempt(["username" => $request->usernamel, "password" => $request->passwordl])) {
            return redirect()->route('annonce.index');
        }

        return redirect()->route('auth.showLoginForm')->with('error', 'Invalid Credentials!');
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("auth.showLoginForm");
    }

    public function index()
    {
        $users = User::where("role", "user")->simplePaginate(8);
        return view('admin.membres.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
