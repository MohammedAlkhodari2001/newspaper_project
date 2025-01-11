<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',  
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Role Checks
     */
    public function isAdmin(): bool
    {
        return $this->type === 'ADMIN';  
    }

    public function isAuthor(): bool
    {
        return $this->type === 'AUTHOR';
    }

    public function isSupport(): bool
    {
        return $this->type === 'SUPPORT_IT';
    }

    /**
     * Relationships
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    

    
}
