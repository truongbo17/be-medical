<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date' => 'date:d-m-Y',
        'created_at'  => 'datetime:H:i d-m-Y',
        'updated_at' => 'datetime:H:i d-m-Y',
    ];

    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'doctor_id', 'id');
    }

    public function medicaldepartmentName()
    {
        return $this->belongsTo('App\Models\MedicalDepartment', 'medicaldepartment_id', 'id');
    }
}
