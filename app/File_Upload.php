<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_Upload extends Model
{
  protected $table = 'file__uploads';

  public function post()
  {
    return $this->belongsTo('App\Post', 'posts_id');
  }
}
