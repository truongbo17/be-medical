<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at'  => 'datetime:H:i d-m-Y',
        'updated_at' => 'datetime:H:i d-m-Y',
    ];

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\CommentPost', 'post_id', 'id');;
    }

    public function totalLike()
    {
        return $this->hasMany('App\Models\LikePost', 'post_id', 'id');
    }

    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function medicaldepartmentName()
    {
        return $this->belongsTo('App\Models\MedicalDepartment', 'medicaldepartment_id', 'id');
    }
}
