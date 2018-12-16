<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = ['gender'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
