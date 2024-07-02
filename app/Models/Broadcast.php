<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Broadcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'subject',
        'content',
        'status',
        'filters',
        'sent_at',
        'user_id',
    ];

    public function sentMails(): MorphMany
    {
        return $this->morphMany(SentMail::class, 'sendable');
    }
}
