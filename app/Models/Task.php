<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    public function department() {
        return $this->belongsTo(Department::class);
    }
    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
