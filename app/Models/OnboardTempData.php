<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnboardTempData extends Model
{
    protected $table = 'onboard_temp_data';

    protected $fillable = [
        'token',
        'onboarding_language_id',
        'type',
        'learning_path_id',
        'daily_goal',
    ];
}
