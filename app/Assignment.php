<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;

    public $table = 'assignments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'course',
        // 'student',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course');
    }
    // public function students()
    // {
    //     return $this->belongsTo(Student::class, 'student');
    // }
    public function assignment_files()
    {
        return $this->hasMany(AssignmentFile::class, 'assignment', 'id');
    }

}
