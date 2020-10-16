<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function Branch(){
        return $this->belongsTo(Branch::class);
    }

    public function SubBranch(){
        return $this->belongsTo(SubBranch::class);
    }

    public function Semester(){
        return $this->belongsTo(Semester::class);
    }

    public function Instructor(){
        return $this->hasOne(Instructor::class);
    }

    public function Students(){
        return $this->hasMany(Student::class);
    }

    public function Grade(){
        return $this->hasOne(Grade::class);
    }
}
