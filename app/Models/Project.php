<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    use SoftDeletes;
    
    protected $guarded = []; 
    
    public function issues(){
        return $this->hasMany(Issue::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'project_user');
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
