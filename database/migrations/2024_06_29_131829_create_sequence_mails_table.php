<?php

use App\Models\Sequence;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Shared\Enums\SequenceMailStatus;

class CreateSequenceMailsTable extends Migration
{
    public function up(): void
    {
        Schema::create('sequence_mails', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sequence::class)->constrained();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('subject');
            $table->text('content');
            $table->string('status')->default(SequenceMailStatus::Draft->value);
            $table->json('filters')->nullable();
            $table->timestamps();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sequence_mails');
    }
}
