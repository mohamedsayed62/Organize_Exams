<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
  use HasApiTokens;
  protected $fillable = [
      'google_id',
      'avatar',
      'name',
      'email',
      'password',
  ];

  public function groups()
  {
    return $this->hasManyThrough(Group::class, Subject::class, 'doctor_id', 'subject_id');
  }

  public function subjects() {
    return $this->hasMany(Subject::class, 'doctor_id');
  }
}
