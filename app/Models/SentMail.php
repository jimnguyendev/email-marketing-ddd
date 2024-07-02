<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SentMail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'sendable_id',
        'sendable_type',
        'subscriber_id',
        'user_id',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function sendable(): MorphTo
    {
        return $this->morphTo();
    }
}
