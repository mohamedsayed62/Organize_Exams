<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = ['name', 'group_id'];
  public $timestamps = false;

  public function group()
  {
    return $this->belongsTo(Group::class, 'group_id');
  }
}
