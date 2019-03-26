<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    
    protected $primaryKey = 'userNumber';
    
    protected $fillable = [
        
        'name', 'token', 'nickName', 'email', 'provider','socialId','password', 'userType', 'userId',
    ];

    protected $hidden = [
         'token', 'remember_token', 'password', 
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
    
    
    public function isAdmin()
    {
        return ($this->userType === '5' ) ?  true : false;
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
