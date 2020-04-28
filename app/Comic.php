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
    
    const STATUS = [
    1 => [ 'label' => '未着手'],
    2 => [ 'label' => '着手中'],
    3 => [ 'label' => '完了'],
   ];
    
    
    public function getStatusLabelAttribute()
    {
       
        $status = $this->attributes['status'];

       
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }
    
    
}
