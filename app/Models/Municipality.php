<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

   protected $fillabe=['municipality_name'];

   public function equipment()
   {
    return $this->hasMany(Equipment::class);
   }

   public function user()
   {
    return $this->belongsTo(User::class);
   }
}
