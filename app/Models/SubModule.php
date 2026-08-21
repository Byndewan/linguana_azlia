<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    public function rModule()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function vocabularies()
    {
        return $this->hasMany(Vocabulary::class, 'sub_module_id', 'id');
    }
}
