<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turies extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'size_group',
        'duration',
        'cost',
    ];
}
