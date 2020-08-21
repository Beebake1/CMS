<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentFile extends Model
{
    protected $table = 'assignment_files';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'file',
        'file_name',
        'assignment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function assignment()
    {
        return $this->belongsToMany(Assignment::class);
    }
}
