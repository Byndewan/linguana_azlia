<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    public function rModule()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
