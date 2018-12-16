<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalInspectionDetail extends Model
{
    protected $fillable = ['final_inspection_record_id', 'kataban_inspection_item_id', 'text_value', 'nominal_value', 'upper_value', 'lower_value', 'check_record', 'measure_record'];
    
    public function final_inspection_record()
    {
        return $this->belongsTo(FinalInspectionRecord::class);
    }
    
    public function kataban_inspection_item()
    {
        return $this->belongsTo(KatabanInspectionItem::class);
    }
}
