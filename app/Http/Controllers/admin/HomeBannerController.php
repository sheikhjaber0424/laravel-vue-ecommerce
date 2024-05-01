<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\ApiResponse;

class HomeBannerController extends Controller
{
    use ApiResponse;
    public function index()
    {

        $data = HomeBanner::all();
        return view('admin.homeBanner.home_banners', compact('data'));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'text'    => 'required|string|max:255',
            'image'   => 'mimes:jpeg,png,jpg,gif|max:5120', //max 5 MB
            'link'    => 'required|string|max:255',
            // 'user_id' => 'required|exists:users,id'
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
            // return response()->json(['status' => 400, 'message' => $validation->errors()->first()]);
        } else {
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $image = HomeBanner::where('id', $request->id)->first();
                    $image_path = "images/" . $image->image . "";
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $image_name = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $image_name);
            } elseif ($request->id > 0) {
                $image_name = HomeBanner::where('id', $request->id)->pluck('image')->first();
            }

            HomeBanner::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' =>  $request->text, 'link' =>  $request->link, 'image' =>  $image_name
                ]
            );
            return $this->success(['reload' => true], 'Successfully updated');
        }
    }
}
