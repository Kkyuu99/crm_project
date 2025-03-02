<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    use SoftDeletes;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($issue) {
            $issue->created_by = Auth::id();
        });

        static::updating(function ($issue) {
            $issue->updated_by = Auth::id();
        });

        static::deleting(function ($issue) {
            $issue->deleted_by = Auth::id();
            $issue->save();
        });
    }
}
