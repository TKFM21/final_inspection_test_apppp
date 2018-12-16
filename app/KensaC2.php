<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KensaC2 extends Model
{
    protected $fillable = ['kensa_c1_id', 'kensa_c2', 'display_no'];
    
    public function kensa_c1()
    {
        return $this->belongsTo(KensaC1::class);
    }
    
    public function kataban_inspection_items()
    {
        return $this->hasMany(KatabanInspectionItem::class);
    }
}
