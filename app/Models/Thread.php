<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $table = 'threads';
    protected $fillable = ['user_id', 'title', 'body'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
