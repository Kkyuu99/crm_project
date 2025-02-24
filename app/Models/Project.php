<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public static function project_create(array $data) {
        if (!isset($data['issue_id'])) {
            $data['issue_id'] = null; 
        }

        $project=new Project();
        $project->fill($data);
        $project->save();

        return $project;
    }
    
    protected $guarded = []; 
    
    public function issues(){
        return $this->hasMany(Issue::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'project_user');
    }

    protected $fillable = [
        'project_name',
        'organization_name',
        'project_type',
        'project_manager',
        'issue_id',
        'contact_name',
        'contact_phone',
        'contact_email',
        'created_by',
        'status',
    ];
}
