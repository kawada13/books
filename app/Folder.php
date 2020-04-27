<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['genre'];
    
    public function comics()
    {
        return $this->hasMany(Comic::class);
    }
    
    

}
