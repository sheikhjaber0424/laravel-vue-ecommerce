<?php

namespace App\Http\Controllers\admin;

use App\Models\Attribute;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;


use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use Validator;


class AttributeController extends Controller
{
    use ApiResponse;

    public function attributeNameIndex()
    {

        $data = Attribute::get();
        return view('admin.attribute.attribute', compact('data'));
    }

    public function storeAttributeName(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'slug'    => 'required|string|max:255',
            // 'user_id' => 'required|exists:users,id'
        ]);
        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            Attribute::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name, 'slug' => $request->slug,
                ]
            );
        }
        return $this->success(['reload' => true], 'Successfully Created');
    }

    public function attributeValueIndex()
    {
        $data = AttributeValue::with('singleAttribute')->get();
        $arrtibutes = Attribute::get();

        return view('admin.attribute.attribute_value', compact('data', 'arrtibutes'));
    }
    public function storeAttributeValue(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'value'    => 'required|string|max:255',
            'attribute_id'    => 'required|exists:attributes,id',
            // 'user_id' => 'required|exists:users,id'
        ]);
        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            AttributeValue::updateOrCreate(
                ['id' => $request->id],
                [
                    'value' => $request->value, 'attribute_id' => $request->attribute_id,
                ]
            );
        }
        return $this->success(['reload' => true], 'Successfully Updated');
    }
}
