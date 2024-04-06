<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => "string|required",
            'email' => "string|required",
            'password' => "string|required",

        ]);

        $arrayData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

$saveload = User::create($arrayData);

if($saveload) {
    dd(response()->json(['data' => $saveload,'status' => 200, ]));
    return to_route('login')->withSuccess('Data has successfuly created!');

} else {

}
    }
public function login(Request $request)
{
$request->validate(['email' => 'required', 'password' => 'required']);

$findUserEmail = User::where('email', $request->email)->first();

if($findUserEmail && Hash::check($request->password, $findUserEmail->password)) {
    $credentials = $request->only('email', 'password');

    if(Auth::attempt($credentials)) {
return to_route('home')->withSuccess('Login data berhasil!');
    }
}
}
    }



