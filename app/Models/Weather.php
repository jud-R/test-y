<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'today',
        'tomorrow',
        'city_id'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
