<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giveaway extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'prize', 'start_date', 'end_date', 'status', 'winner_user_id'];


    protected function casts(): array
    {
        return [
        'start_date' => 'date',
        'end_date' => 'date',
        ];
    }

    public function entries()
    {
        return $this->hasMany(GiveawayEntry::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'giveaway_entries')
            ->withPivot('joined_at')
            ->withTimestamps();
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_user_id');
    }

    public function scopeActiveForEntries($query)
    {
        return $query->where('status', 'active')
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->with('entries', 'winner')
            ->withCount('entries')
            ->orderBy('end_date');
    }

    public function scopeOpen($query)
    {
        return $query->activeForEntries();
    }

}
