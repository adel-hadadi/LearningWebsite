<?php

namespace App\Models\Educational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'video', 'files', 'file_size', 'lesson_type', 'course_id', 'status'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
