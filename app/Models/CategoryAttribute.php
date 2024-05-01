<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'category_attribute';


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'attribute_id');
    }
}
