<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $table = 'votes';
    
    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}