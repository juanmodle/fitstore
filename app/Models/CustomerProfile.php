<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone', 'birth_date', 'gender', 'is_vip', 'points'];


    protected function casts(): array
    {
        return [
        'birth_date' => 'date',
        'is_vip' => 'boolean',
        'points' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
