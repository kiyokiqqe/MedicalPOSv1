<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

   protected $fillable = [
    'name',
    'quantity',
    'description',
    'code',
    'arrival_date',
    'expiration_date',
];

}
