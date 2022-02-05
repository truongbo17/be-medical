<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
    ];
    protected $casts = [
        'created_at'  => 'datetime:H:i d-m-Y',
        'updated_at' => 'datetime:H:i d-m-Y',
    ];

    public function getNamePost()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
