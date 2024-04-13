<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoReportModel extends Model
{
    use HasFactory;
    protected $table = "foto_reports";

    protected $fillable = [
        'nama',
        'report_id'
    ];
}
