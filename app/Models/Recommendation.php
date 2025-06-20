<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_card_id',
        'text',
        'is_done',
        'done_at',
        'done_by',
    ];

    protected $casts = [
        'is_done' => 'boolean',
        'done_at' => 'datetime',
    ];

    /**
     * Медична картка, до якої належить рекомендація
     */
   public function medicalCard()
{
    return $this->belongsTo(MedicalCard::class);
}


    /**
     * Пацієнт через медичну картку (hasOneThrough)
     */
    // Recommendation.php
    public function patient() {
    return $this->hasOneThrough(
        Patient::class,
        MedicalCard::class,
        'id',            // localKey в таблиці medical_cards
        'id',            // localKey в таблиці patients
        'medical_card_id', // foreignKey в recommendations
        'patient_id'     // foreignKey в medical_cards
        );
    }
    
}
