<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_category_id',
        'uuid',
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the master category that owns this category.
     */
    public function masterCategory(): BelongsTo
    {
        return $this->belongsTo(MasterCategory::class);
    }
}
