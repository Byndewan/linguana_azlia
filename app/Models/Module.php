<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function rLearningPath()
    {
        return $this->belongsTo(LearningPath::class, 'learning_path_id');
    }

    public function subModules()
    {
        return $this->hasMany(SubModule::class, 'module_id', 'id');
    }

    public function finalQuizzes()
    {
        return $this->hasMany(FinalQuiz::class, 'module_id');
    }
}
