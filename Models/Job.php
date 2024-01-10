<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'experience', 'description', 'job_type', 'education_level', 'salary', 'employer_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function skill(){
        return $this->hasMany('App\Jobskill');
    }
}
