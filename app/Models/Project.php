<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    use HasFactory, Notifiable;
    public function issues(){
        return $this->hasMany(issue::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
}
}
