<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Get the users that belong to this role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    /**
     * Get the permissions that belong to this role.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    /**
     * Check if role has a specific permission.
     */
    public function hasPermission($permission)
    {
        return $this->permissions->contains('slug', $permission);
    }
    
    // Convert name to lowercase
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::lower($value);
    }

    // Convert slug to lowercase
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(Str::lower($value));
    }
}
