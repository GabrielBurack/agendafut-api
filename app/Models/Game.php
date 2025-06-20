<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
}
