<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['student_code'];

    protected $casts = ['full_name' => 'text'];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function sub_branch(){
        return $this->belongsTo(SubBranch::class);
    }

    public function grades(){
        return $this->hasMany(Grade::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }


}
