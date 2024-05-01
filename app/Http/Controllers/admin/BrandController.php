<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\Models\Brand;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    use ApiResponse;
    public function index()
    {

        $data = Brand::all();
        return view('admin.brand.brand', compact('data'));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'text'    => 'required|string|max:255',
            'image'   => 'mimes:jpeg,png,jpg,gif|max:5120',

        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $image = Brand::where('id', $request->id)->first();
                    $image_path = "images/" . $image->image . "";
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $image_name = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $image_name);
            } elseif ($request->id > 0) {
                $image_name = Brand::where('id', $request->id)->pluck('image')->first();
            }

            Brand::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' =>  $request->text, 'image' =>  $image_name
                ]
            );
            return $this->success(['reload' => true], 'Successfully updated');
        }
    }
}
