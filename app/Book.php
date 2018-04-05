<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   protected $table = 'books';
  
   public function users(){
       return $this->belongsToMany(User::class, 'book_user', 'book_id', 'user_id');
   }
}

