<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionModel extends Model
{
    use HasFactory;

    protected $table = 'solutions';
    protected $fillable=[
        'keterangan',
        'photo',
        'report_id'
    ];
}
