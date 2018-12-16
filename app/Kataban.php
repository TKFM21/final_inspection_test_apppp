<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kataban extends Model
{
    protected $fillable = ['kataban', 'reted_voltage', 'fan_kbn1_id', 'revision'];
    
    public function fan_kbn1()
    {
        return $this->belongsTo(FanKbn1::class);
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    
    public function application_user()
    {
        return $this->belongsTo(User::class, 'application_user_id');
    }
    
    public function confirmed_user()
    {
        return $this->belongsTo(User::class, 'confirmed_user_id');
    }
    
    public function approval_user()
    {
        return $this->belongsTo(User::class, 'approval_user_id');
    }
    
    public function kataban_inspection_items()
    {
        return $this->hasMany(KatabanInspectionItem::class);
    }
    
    public function final_inspection_records()
    {
        return $this->hasMany(FinalInspectionRecord::class);
    }
}
