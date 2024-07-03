<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Shared\Enums\BroadcastStatus;

class CreateBroadcastsTable extends Migration
{
    public function up(): void
    {
        Schema::create('broadcasts', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('subject')->nullable(false);
            $table->text('content')->nullable(false);
            $table->json('filters')->nullable();
            $table->string('status')->default(BroadcastStatus::Draft->value);
            $table->dateTime('sent_at')->nullable();
            $table->timestamps();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('broadcasts');
    }
}
