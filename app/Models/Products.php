<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Products extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttributes::class, 'product_id', 'id');
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategories::class, 'product_id', 'id');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['user'] = $this->user->name;

        $array['product_attributes'] = $this->productAttributes->map(function ($data) {
            return [
                'attribute_name' => $data->attribute->attribute_name,
                'attribute_value' => $data->attribute_value,
            ];
        })->toArray();

        $array['product_categories'] = $this->productCategories->pluck('category.category_name')->toArray();
        return $array;
    }
}
