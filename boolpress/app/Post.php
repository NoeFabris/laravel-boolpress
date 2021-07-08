<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany("App\Tag");
      }

    protected $fillable = [
        'title', 'content', 'slug', 'category_id', 'cover_url',
    ];
}
