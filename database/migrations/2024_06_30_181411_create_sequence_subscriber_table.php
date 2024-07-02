<?php

use App\Models\Sequence;
use App\Models\Subscriber;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSequenceSubscriberTable extends Migration
{
    public function up(): void
    {
        Schema::create('sequence_subscriber', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sequence::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Subscriber::class)->constrained()->cascadeOnDelete();
            $table->dateTime('subscribed_at')->useCurrent();
            $table->string('status')->nullable()->default(null);

            $table->unique(['sequence_id', 'subscriber_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sequence_subscriber');
    }
}
