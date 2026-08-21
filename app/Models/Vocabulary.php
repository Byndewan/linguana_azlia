<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    public function subModule()
    {
        return $this->belongsTo(SubModule::class, 'sub_module_id', 'id');
    }

    public function rLanguage()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
