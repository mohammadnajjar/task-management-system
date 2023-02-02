<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $guarded=[];
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    public function departments() {
        return $this->belongsToMany(Department::class);
    }
}
