<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_from',
        'end_to',
        'turnover',
        'winning',
        'ggr',
        'tax_ggr',
        'tax_winning',
        'single',
        'multiple',
        'system',
        'chain'
    ];

     
}
