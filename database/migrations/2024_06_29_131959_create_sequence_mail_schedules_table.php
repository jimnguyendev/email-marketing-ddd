<?php

use App\Models\SequenceMail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSequenceMailSchedulesTable extends Migration
{
    public function up(): void
    {
        Schema::create('sequence_mail_schedules', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SequenceMail::class)->constrained()->cascadeOnDelete();
            $table->integer('delay');
            $table->string('unit');
            $table->json('allowed_days');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sequence_mail_schedules');
    }
}
