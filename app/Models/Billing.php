<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Billing extends Model
{
    use HasFactory;
    protected $table = 'billing';
    protected $fillable = ['p_id', 'date', 'items', 'prices', 'quantities', 'total', 'sub_total', 'discount', 'grand_total'];
    
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'p_id');
    }
    public function prescription(): BelongsTo
    {
        return $this->belongsTo(Prescription::class, 'pres_id');
    }
    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }

    protected $casts = [
        'items' => 'json',
        'prices' => 'json',
        'quantities' => 'json',
        'total' => 'json',
    ];

    protected function data(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => json_encode($value),
            get: fn ($value) => json_decode($value, true),
        );
    } 
}
