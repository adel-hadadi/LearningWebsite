<?php

namespace App\Models\Educational;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = ['title', 'summary', 'image', 'students_count', 'time_limit', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    protected $casts = ['image' => 'array'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
