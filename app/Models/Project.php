<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function issue(){
        return $this->belongsTo(issue::class);
    }
}
