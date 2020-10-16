<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    public function students(){
        return $this->hasMany(Student::class);
    }

    public function instructors(){
        $this->hasMany(Instructor::class);
    }
   
    public function Courses(){
        $this->hasMany(Course::class);
    }

}
