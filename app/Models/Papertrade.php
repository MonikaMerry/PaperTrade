<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Papertrade extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'paper_trades';

    protected $fillable = [
        'pair_name',
        'entry',
        'entry_time',
        'status',
    ];
}
