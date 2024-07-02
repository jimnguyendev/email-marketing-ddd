<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Sequence extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'user_id',
    ];

    public function mails(): HasMany
    {
        return $this->hasMany(SequenceMail::class);
    }

    public function sentMails(): HasManyThrough
    {
        return $this->hasManyThrough(
            SentMail::class,
            SequenceMail::class,
            'sequence_id',
            'sendable_id'
        )->where('sent_mails.sendable_type', SequenceMail::class);
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(Subscriber::class)->withPivot(['subscribed_at', 'status']);
    }
}
