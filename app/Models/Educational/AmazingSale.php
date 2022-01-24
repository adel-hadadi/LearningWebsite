<?php

namespace App\Models\Educational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmazingSale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['course_id', 'percentage', 'status', 'started_date', 'end_date'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
