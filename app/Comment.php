<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'commentNumber';
    
    protected $with = ['user'];
    
    protected $fillable=[
            'postNumber','userNumber','statusValue','postReportContent','commentContent','parentCommentNumber','commentableUserNumber','commentableType',
        ];
    
    public function boards()
    {
        return $this->belongsTo(Board::class, 'boardNumber');
    }
    
    public function user()
    {   
        // 뒤에 두번째 인자에 외래키인것 적어줘야 인식됨  
        return $this->belongsTo(User::class, 'userNumber');
    }

     public function posts()
    {
        return $this->belongsTo(Post::class, 'postNumber');
    }
    
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parentCommentNumber')->latest();
    }
    
    public function parent()
    {
        return $this->belongTo(Comment::class, 'parentCommentNumber', 'commentNumber');
    }
    
}
