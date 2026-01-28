<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseñoReporte extends Model
{
    use HasFactory;

    protected $table = 'diseños_reporte';

    protected $fillable = [
        'report',
        'file',
        'date',
        'time',
        'size'
    ];
}
