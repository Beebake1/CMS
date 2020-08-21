<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    public $table = 'students';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'course_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
