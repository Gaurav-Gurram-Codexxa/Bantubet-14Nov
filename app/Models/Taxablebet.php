<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxablebet extends Model
{
    use HasFactory;
    protected $fillable = [
		'BetID',
        'PlayerID',
        'Stake',
        'PossibleWining',
        'SelectionCount',
        'Odds',
        'Winning',
        'TaxAmount',
        'Type',
        'GGR',
        'State',
        'Created',
        'CalculationDate',
        'Bonus',
		'GameType',
		'Mode',
    ];
}
