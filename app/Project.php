<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = 'project';
    
    function tasks(){
        return $this->hasMany('App\Task');
    }
}
