<?php

namespace App\Models\Educational;

use App\Models\User;
use App\Models\User\Teacher;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $casts = ['image' => 'array'];
    protected $fillable = ['title', 'image', 'description', 'summary', 'price', 'video', 'cource_size',
     'teacher_id', 'category_id', 'status', 'slug', 'tags', 'published_at'];


    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
