<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';

    public function tasks() {
        return $this->hasMany(Task::class);
    }
    public function users() {
        return $this->hasMany(User::class);
    }
    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
