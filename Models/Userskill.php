<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userskill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'user_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
