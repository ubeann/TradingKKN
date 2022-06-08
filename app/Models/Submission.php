<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'origin_district',
        'origin_village',
        'origin_city',
        'destination',
        'reason',
        'username_line',
        'username_telegram',
        'status'
    ];
}
