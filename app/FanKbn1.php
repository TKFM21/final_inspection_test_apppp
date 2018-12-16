<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FanKbn1 extends Model
{
    protected $fillable = ['fan_kbn1'];
    
    public function katabans()
    {
        return $this->hasMany(Kataban::class);
    }
}
