<?php

namespace App\Models\Educational;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['author_id', 'course_id', 'parent_id', 'body', 'approved', 'seen' , 'status'];

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function parent() {
        return $this->belongsTo($this, 'parent_id');
    }

    public function answers(){
        return $this->hasMany($this, 'parent_id');
    }
}
