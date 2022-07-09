<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $req)
    {
        $user = User::create([
            'first_name' => $req->first_name,
            'last_name'=> $req->last_name,
            'email'=> $req->email,
            'password'=> Hash::make($req->password)]);
        return response()->json($user);
        // return response()->json(['aa'=> 'bbb']);

    }

}
