<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiModels extends Model
{
    use HasFactory;
    protected $table = 'lokasis';

    protected $fillable = [
        'nama_lokasi'
    ];
}