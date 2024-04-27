<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => 400, 'message' => $validation->errors()->first()]);
        } else {
            $credentials = array('email' => $request->email, 'password' => $request->password);
            if (Auth::attempt($credentials, false)) { //if credentials are not false
                if (Auth::User()->hasRole('admin')) {
                    return response()->json(['status' => 200, 'message' => 'Admin User']);
                } else {
                    return response()->json(['status' => 200, 'message' => 'Not Admin User']);
                }
            } else {
                return response()->json(['status' => 404, 'message' => $validation->errors()->first()]);
            }
        }
    }
}
