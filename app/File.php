<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=['filename','bytes','mime','postNumber'];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function getBytesAttribute($value)
    {
        return format_filesize($value);
    }
    
    public function getUrlAttribute()
    {
        return url('files/'.$this->filename);
    }
    
}
