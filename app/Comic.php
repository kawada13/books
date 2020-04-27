<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title', 'comment', 'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
