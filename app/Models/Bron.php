<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bron extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'turies_id ',
        'name',
        'phone',
        'email',
        'people',
    ];
}
