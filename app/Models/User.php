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

    protected $guarded=[];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getRoleAttribute()
    {
        return $this->attributes['role'];
    }

    public function projects(){
        return $this->belongsToMany(Project::class, 'project_user');
    }
    public function issues()
    {
        return $this->hasMany(Issue::class, 'assignor_user');
    }
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
