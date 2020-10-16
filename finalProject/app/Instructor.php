<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public function students(){
        return $this->hasMany(Student::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function subBranch(){
        return $this->belongsTo(SubBranch::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
