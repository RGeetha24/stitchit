<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    protected $fillable = [
        'name',
        'uuid',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'sort_order'
    ];

    /**
     * Get the categories for the master category.
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'master_category_id');
    }
}
