<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    use HasFactory;
    protected $table = 'reports';

    protected $fillable = [
        'judul',
        'keterangan',
        'lokasi_id',
        'tag_id',
        'status',
        'user_id',
        'solution_id',
        'photo',
    ];
}
