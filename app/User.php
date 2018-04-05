<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $table = 'users';
    use Notifiable;
    
    public function roles() {
        return $this->belongsTo(Role::class);
    }
    
    public function books(){
        return $this->belongsToMany(Book::class, 'book_user', 'user_id', 'book_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password', 'fio', 'phone', 'uniq_num',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
}
