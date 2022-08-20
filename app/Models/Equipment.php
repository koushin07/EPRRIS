<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_name',
        'municipality_id',
        'code',
        'asset_desc',
        'category',
        'unit',
        'model_number',
        'serial_number',
        'status',
        'asset_id',
        'remarks',
        'quantity',
    ];


    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
