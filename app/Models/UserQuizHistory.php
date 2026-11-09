<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizHistory extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subModule()
    {
        return $this->belongsTo(SubModule::class, 'sub_module_id'); 
    }
}
