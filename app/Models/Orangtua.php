<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nama_ayah', 'pekerjaan_ayah', 'hp_ayah', 'nama_ibu', 'pekerjaan_ibu', 'hp_ibu', 'nama_wali', 'alamat_wali', 'hp_wali'];
}
