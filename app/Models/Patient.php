<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * Масово призначувані атрибути.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'phone',
    ];

    /**
     * Приведення атрибутів.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date',  // Автоматичне приведення до Carbon
    ];
}
