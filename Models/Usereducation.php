<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usereducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'level', 'start_date', 'end_date', 'user_id'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'start_date', 'end_date'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
