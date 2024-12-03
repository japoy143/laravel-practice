<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        // //validate
        // $attributes = request()->validate([
        //     "email" => ["required", "email"],
        //     "password" => ["required",],
        // ]);


        $user = User::where('email', '=', $request->email)->first();
        if ($user && $request->password == $user->password) {

            Auth::login($user);
            if (Auth::check()) {
                request()->session()->regenerate();

                return redirect(route("jobs.index"));
            } else {
                return redirect(route("home"));
            }
        };



        // //attempt to login
        // if (! Auth::attempt($attributes)) {

        //     throw ValidationException::withMessages(["email" => "SOrry email do not match", "password" => "password do noot match"]);
        // }

        //regenerate session

        //redirect
        return redirect(route("home"));
    }



    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
