<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponse;

class ProfileController extends Controller
{
    use ApiResponse;
    public function index()
    {
        return view('admin.profile');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|unique:users,email,' . Auth::user()->id,
            'image'   => 'mimes:jpeg,png,jpg,gif|max:5120', //max 5 MB
            'address'    => 'required|string|max:255',
            // 'user_id' => 'required|exists:users,id'
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 200, []);
            // return response()->json(['status' => 400, 'message' => $validation->errors()->first()]);
        } else {
            if ($request->hasFile('image')) {
                $image_name = 'images/' . $request->name . time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $image_name);
            } else {
                $image_name = Auth::User()->image;
            }
            $user = User::updateOrCreate(
                ['id' => Auth::User()->id],
                [
                    'name' => $request->name, 'email' => $request->email, 'image' => $image_name, 'address' => $request->address, 'phone' => $request->phone,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                ]
            );
            // return response()->json(['status' => 200, 'message' => 'Successfully updated']);
            return $this->success([], 'Successfully updated');
        }
    }
}
