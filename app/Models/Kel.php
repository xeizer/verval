<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kec_id',
    ];

    public function kec()
    {
        return $this->belongsTo(Kec::class);
    }
}
