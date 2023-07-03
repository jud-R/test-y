<?php

namespace App\Models;

use App\Models\Weather;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function weathers(): HasMany
    {
        return $this->hasMany(Weather::class);
    }
}
