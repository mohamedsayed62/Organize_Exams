<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  protected $fillable = [
      'name',
      'doctor_id',
      'location',
  ];

  public $timestamps = false;

  public function doctor()
  {
    // relation By Id
    return $this->belongsTo(Doctor::class, 'doctor_id');
  }

  public function students()
  {
    return $this->hasManyThrough(Student::class, Group::class, 'subject_id', 'group_id');
  }

  public function groups()
  {
    return $this->hasMany(Group::class, 'subject_id');
  }
}
