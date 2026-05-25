<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'phone',
        'warehouse_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password'          => 'hashed',
        'is_active'         => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    // Konstanta role supaya tidak typo di mana-mana
    const ROLES = [
        'admin',
        'owner',
        'engineering',
        'kepala_wh',
        'sopir',
        'mandor',
        'tukang',
    ];

    // Helper cek role
    public function isAdmin(): bool      { return $this->role === 'admin'; }
    public function isOwner(): bool      { return $this->role === 'owner'; }
    public function isEngineering(): bool{ return $this->role === 'engineering'; }
    public function isKepalaWh(): bool   { return $this->role === 'kepala_wh'; }
    public function isSopir(): bool      { return $this->role === 'sopir'; }
    public function isMandor(): bool     { return $this->role === 'mandor'; }
    public function isTukang(): bool     { return $this->role === 'tukang'; }

    // Label role untuk tampilan
    public function roleName(): string
    {
        return match($this->role) {
            'admin'       => 'Admin',
            'owner'       => 'Owner',
            'engineering' => 'Teknik Sipil',
            'kepala_wh'   => 'Kepala Warehouse',
            'sopir'       => 'Sopir',
            'mandor'      => 'Mandor',
            'tukang'      => 'Tukang',
            default       => ucfirst($this->role),
        };
    }
}