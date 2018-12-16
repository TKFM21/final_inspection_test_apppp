<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KensaC1 extends Model
{
    protected $fillable = ['kensa_c1', 'display_no'];
    
    public function kensa_c2s()
    {
        return $this->hasMany(KensaC2::class);
    }
}
