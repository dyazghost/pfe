<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubBranch extends Model
{
    public function branch(){
        $this->belongsTo(Branch::class);
    }

    public function instructors(){
        $this->hasMany(Instructor::class);
    }

    public function students(){
        $this->hasMany(Student::class);
    }

    public function courses(){
        $this->hasMany(Course::class);
    }
}
