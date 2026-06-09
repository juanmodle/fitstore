<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'document_type', 'file_path', 'related_model', 'related_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
