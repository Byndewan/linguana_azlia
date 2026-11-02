<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    protected $guarded = ['id'];

    public function learningPaths(): HasMany
    {
        return $this->hasMany(LearningPath::class, 'language_id');
    }
}
