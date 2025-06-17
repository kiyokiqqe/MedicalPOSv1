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
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',  // автоматичне хешування пароля Laravel 10+
    ];

    // Роль перевірки
    public function isChief() { return $this->role === 1; }
    public function isAdmin() { return $this->role === 2; }
    public function isDoctorOrPharmacist() { return $this->role === 3; }
    public function isNurse() { return $this->role === 4; }
}
