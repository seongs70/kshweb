<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //public $timestamps = false;
    
    protected $fillable=['userNumber','postNumber','up','down',];//'voted_at',
    
    //protected $dates = ['voted_at',];
     public function posts()
    {
        return $this->belongsTo(Post::class, 'postNumber');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function setUpAttribute($value)
    {
        $this->attributes['up'] = $value ? 1 : null;
    }
    
    public function setDownAttribute($value)
    {
        $this->attributes['down'] = $value ? 1: null;
    }
    
}
