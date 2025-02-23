<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'commision_rate',
        'banner',
        'icon',
        'featured',
        'top',
        'meta_title',
        'meta_description'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
