<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_category_id',
        'category_id',
        'uuid',
        'name',
        'slug',
        'description',
        'icon',
        'price',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * Get the master category that owns this service.
     */
    public function masterCategory(): BelongsTo
    {
        return $this->belongsTo(MasterCategory::class);
    }

    /**
     * Get the category that owns this service.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
