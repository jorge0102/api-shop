<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcludedVegetables extends Model
{
    protected $table = 'vegetables_excluded';

    use HasFactory;
}
