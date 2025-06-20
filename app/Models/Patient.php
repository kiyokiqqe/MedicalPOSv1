<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

        protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'phone',
    ];

        protected $casts = [
        'birth_date' => 'date',
    ];

    public function medicalCard()
    {
        return $this->hasOne(MedicalCard::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
