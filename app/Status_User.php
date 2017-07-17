<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_User extends Model
{
  protected $table = 'user_detail';

  public function user_detail()
  {
    return $this->belongsTo('App\User', 'from_user');
  }
}
