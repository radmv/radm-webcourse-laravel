<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'path_trailer',
        'about',
        'thumbnail',
        'category_id',
        'teacher_id',
    ];

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
