<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title'];

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function tags()
    {
      return $this->belongsToMany('App\Tag');

    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

    public function author()
    {
      return $this->belongsTo('App\User', 'author_id');
    }

    public function file_uploads()
    {
      return $this->hasMany('App\File_Upload');
    }
}
