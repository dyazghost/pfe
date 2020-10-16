<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function Courses(){
        return $this->hasMany(Course::class);
    }
}
