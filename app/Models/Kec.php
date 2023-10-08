<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kec extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kota_id',
    ];
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
