<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningPath extends Model
{
    public function rLanguage()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
