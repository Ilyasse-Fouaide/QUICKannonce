<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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

        return response()->json([
            'message' => 'Inscription réussie ! Vous pouvez maintenant vous connecter pour créer vos propres annonces.',
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => ['required'],
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('access_token')->accessToken;

            return response()->json([
                'access_token' => $token
            ], 200);
        }

        return response()->json([
            'error' => 'Invalid credentials!'
        ], 401);
    }

    public function profile()
    {
        $user = Auth::user();
        return response()->json($user, 200);
    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
    }

    public function index()
    {
        $users = User::where("role", "user")->get();
        return response()->json($users, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(["messag" => "Membre has been deleted successfuly."], 200);
    }
}
