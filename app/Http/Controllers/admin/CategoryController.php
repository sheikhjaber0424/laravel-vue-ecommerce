<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\Models\Category;
use App\Models\Attribute;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\CategoryAttribute;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    use ApiResponse;

    public function index()
    {

        $data = Category::get();
        return view('admin.category.category', compact('data'));
    }

    public function store(Request $request)
    {
        $image_name = null;

        $validation = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'slug'    => 'required|string|max:255',
            // 'attribute_id'    => 'required|exists:attributes,id',
            'image'   => 'mimes:jpeg,png,jpg,gif|max:5120', //max 5 MB
            // 'user_id' => 'required|exists:users,id'
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
            // return response()->json(['status' => 400, 'message' => $validation->errors()->first()]);
        } else {
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $image = Category::where('id', $request->id)->first();
                    $image_path = "images/" . $image->image . "";
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $image_name = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $image_name);
            } elseif ($request->id > 0) {
                $image_name = Category::where('id', $request->id)->pluck('image')->first();
            }

            if ($request->parent_category_id) {
                Category::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name, 'slug' => $request->slug,
                        // 'attribute_id' => $request->attribute_id ?? null,
                        'image' => $image_name, 'parent_category_id' => $request->parent_category_id
                    ]
                );
            } else {
                Category::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name, 'slug' => $request->slug,
                        // 'attribute_id' => $request->attribute_id ?? null,
                        'image' => $image_name
                    ]
                );
            }

            return $this->success(['reload' => true], 'Successfully updated');
        }
    }
    public function indexCategoryAttribute()
    {
        $data = CategoryAttribute::with('category', 'attribute')->get();
        $categories = Category::get();
        $attributes = Attribute::get();
        return view('admin.category.categoryAttribute', compact('data', 'categories', 'attributes'));
        // return $data->toArray();
    }

    public function storeCategoryAttribute(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'attribute_id'    => 'required|exists:attributes,id',
            'category_id'    => 'required|exists:categories,id',
        ]);
        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            CategoryAttribute::updateOrCreate(
                ['id' => $request->id],
                [
                    'category_id' => $request->category_id, 'attribute_id' => $request->attribute_id,
                ]
            );
        }
        return $this->success(['reload' => true], 'Successfully Updated');
    }
}
