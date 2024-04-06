<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $fillable = [
        'title',
        'description',
        'slug',
        'categories',
        'tanggalDibuat',
        'userID'
    ];

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
