<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    
<<<<<<< HEAD
=======
    protected $guarded = []; 
    
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
    public function issues(){
        return $this->hasMany(Issue::class);
    }

<<<<<<< HEAD
    public function user() {
        return $this->belongsTo(User::class);
=======
    public function users() {
        return $this->belongsToMany(User::class, 'project_user');
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
    }
}
