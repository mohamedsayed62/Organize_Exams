<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'number_of_students', 'subject_id', 'time'];
    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function students()
{
    return $this->hasMany(Student::class, 'group_id');
}
}
