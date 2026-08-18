<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function rLearningPath()
    {
        return $this->belongsTo(LearningPath::class, 'learning_path_id');
    }
}
