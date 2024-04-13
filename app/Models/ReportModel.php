<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\Likeable;

class ReportModel extends Model
{
    use HasFactory, Likeable;
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
        'vote'
    ];
}
