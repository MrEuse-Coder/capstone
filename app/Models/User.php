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
        'college',
        'admin_id',
        'email',
        'password',
        'role',
    ];

    public function isUser(){
        return $this->role === 'user';
    }

    public function isAdminisSuperAdmin(){
        return in_array($this->role, ['admin', 'super_admin']);
    }

    public function isAdmin(){
        return $this->role === 'admin';
    }

    public function isSuperAdmin(){
        return $this->role === 'super_admin';
    }
    public function class_batch(){
        return $this->hasMany(ClassBatch::class);
    }

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
}
