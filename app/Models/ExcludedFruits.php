<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcludedFruits extends Model
{
    protected $table = 'fruits_excluded';
     
    use HasFactory;
}
