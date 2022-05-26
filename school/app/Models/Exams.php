<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    /**
     * Get the course.
     */
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    /**
     * Get the semester.
     */
    public function semester()
    {
        return $this->belongsTo(Semesters::class, 'semester_id');
    }
}
