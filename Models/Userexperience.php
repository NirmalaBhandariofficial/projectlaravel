<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userexperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'position', 'employment_type', 'start_date', 'end_date', 'experience', 'user_id'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'start_date', 'end_date'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
