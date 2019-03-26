<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{   
    protected $primaryKey = 'boardNumber';
    
    protected $fillable=['boardTypeCode','statusValue','registUser','boardName'];
    
    protected $with = ['user'];
    
    public function boards()
    {
        return $this->belongsTo(Board::class, 'boardNumber');
    }
    
    public function user()
    {   
        // 뒤에 두번째 인자에 외래키인것 적어줘야 인식됨  
        return $this->belongsTo(User::class, 'userNumber');
    }
    
 
}
