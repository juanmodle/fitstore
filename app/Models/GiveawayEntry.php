<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiveawayEntry extends Model
{
    use HasFactory;

    protected $fillable = ['giveaway_id', 'user_id', 'joined_at'];


    protected function casts(): array
    {
        return [
        'joined_at' => 'datetime',
        ];
    }

    public function giveaway()
    {
        return $this->belongsTo(Giveaway::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
