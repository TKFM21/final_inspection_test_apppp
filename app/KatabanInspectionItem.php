<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KatabanInspectionItem extends Model
{
    protected $fillable = ['kataban_id', 'kensa_c2_id'];
    
    public function kataban()
    {
        return $this->belongsTo(Kataban::class);
    }
    
    public function kensa_c2()
    {
        return $this->belongsTo(KensaC2::class);
    }
    
    public function final_inspection_details()
    {
        return $this->hasMany(FinalInspectionDetail::class);
    }
}
