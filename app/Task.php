<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = ['title', 'description', 'due'];
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
