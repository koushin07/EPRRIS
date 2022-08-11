<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable =['province_name'];

    public function municipality()
    {
        return $this->hasMany(Municipality::class);
    }

    public function equipment()
    {
        return $this->hasManyThrough(Equipment::class, Municipality::class);
    }
}
