<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    
    protected $guarded = []; 
    
    public function issues(){
        return $this->hasMany(Issue::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'project_user');
    }
}
