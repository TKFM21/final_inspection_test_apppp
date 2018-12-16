<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalInspectionRecord extends Model
{
    protected $fillable = ['kataban_id', 'order_no', 'lot_no', 'qty', 'inspector_id', 'judge'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }
    
    public function kataban()
    {
        return $this->belongsTo(Kataban::class);
    }
    
    public function final_inspection_details()
    {
        return $this->hasMany(FinalInspectionDetail::class);
    }
}
