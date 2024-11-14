<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
    use HasFactory;

    protected $fillable = [
		'limit_for',
        'start_from',
        'end_to',
        'turnover',
        'winning',
        'winning_no',
        'bet_no',
        'ggr',
        'tax_ggr',
        'tax_winning',
        'single',
        'multiple',
        'system',
        'chain',
		'eligible_bet_display_percent',
		'eligible_amount_max',
		'eligible_amount_min',
    ];
}
