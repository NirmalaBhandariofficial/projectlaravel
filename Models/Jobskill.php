<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobskill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'job_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }
}
