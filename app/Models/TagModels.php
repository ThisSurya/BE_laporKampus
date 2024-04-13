<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagModels extends Model
{
    use HasFactory;
    protected $table = 'tags';

    protected $fillable = [
        'nama_tag',
        'deskripsi'
    ];
}
