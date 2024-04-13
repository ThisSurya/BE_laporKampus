<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoSolutionModel extends Model
{
    use HasFactory;
    protected $table = "foto_solutions";

    protected $fillable = [
        'nama',
        'solution_id'
    ];
}
