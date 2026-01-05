<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'profile_picture',
        'bust',
        'waist',
        'hip',
        'shoulder_width',
        'sleeve_length',
        'dress_length',
        'role'
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * Check if user has a specific role.
     */
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    /**
     * Check if user has a specific permission.
     */
    public function hasPermission($permission)
    {
        return $this->roles->flatMap->permissions->contains('name', $permission);
    }

    /**
     * Check if user is admin or super admin.
     */
    public function isAdmin()
    {
        // Check simple role field first
        if ($this->role && in_array(strtolower($this->role), ['admin', 'super admin', 'superadmin'])) {
            return true;
        }
        
        // Check roles relationship
        return $this->hasRole('admin') || $this->hasRole('super admin') || $this->hasRole('superadmin');
    }

    /**
     * Check if user has permission or is admin.
     */
    public function canAccess($permission)
    {
        return $this->isAdmin() || $this->hasPermission($permission);
    }
}
