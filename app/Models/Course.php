<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class);
    }
    public function courseKeypoints()
    {
        return $this->hasMany(CourseKeypoint::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
