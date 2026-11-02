<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalQuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module_id',
        'score',
        'total_correct',
        'status',
        'xp_earned'
    ];
}
