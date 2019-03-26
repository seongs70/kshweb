<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{   
    protected $fillable=['postNumber','postName', 'nickName' ,'postContent','userNumber','statusValue','boardNumber','postparentNumber','announcementFunctionStatus','secretPostStatus','viewCount','thumbnail'];
    
    protected $with = ['user'];
    
    protected $primaryKey = 'postNumber';
    
    public function user()
    {   
        // 뒤에 두번째 인자에 외래키인것 적어줘야 인식됨  
        return $this->belongsTo(User::class, 'userNumber');
    }
    
    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }
    
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
    
    public function files()
    {
        return $this->hasMany(File::Class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'commentNumber');
    }
   
    
    public function vote()
    {
        return $this->hasMany(Vote::class, 'voteNumber');
    }
    
    protected $appends = ['upCount', 'downCount', ];
    
}
