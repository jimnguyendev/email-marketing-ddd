<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SequenceMailSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'delay',
        'unit',
        'allowed_days',
        'sequence_mail_id',
    ];

    public function sequenceMail(): BelongsTo
    {
        return $this->belongsTo(SequenceMail::class);
    }
}
