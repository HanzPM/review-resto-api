<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resto extends Model
{
    use HasFactory;

    protected $fillable =[

        'name',
        'description',
        'address',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
