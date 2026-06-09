<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaAsset extends Model
{
    use HasFactory;

    protected $fillable = ['uploaded_by_user_id', 'file_path', 'file_type', 'file_size', 'alt_text', 'related_model', 'related_id'];


    protected function casts(): array
    {
        return [
        'file_size' => 'integer',
        ];
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by_user_id');
    }
}
