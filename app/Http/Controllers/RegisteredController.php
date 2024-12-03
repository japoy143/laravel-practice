<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;



class RegisteredController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }


    public function store()
    {
        try {
            $validatedAttributes =  request()->validate([
                'first_name' => ['required', 'string',],
                'last_name' => ['required', 'string',],
                'email' => ['required', 'email',],
                'password' => ['required', Password::min(8), 'confirmed'],
            ]);


            $user =  User::create($validatedAttributes); // this will only work when the validation model is the same with the database model or in migration

            //login
            Auth::login($user);

            return redirect(route('jobs.index'));
        } catch (Exception $e) {
            return redirect(route('login'));
        }
    }
}
