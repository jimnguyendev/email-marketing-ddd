<?php

use App\Models\Automation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomationStepsTable extends Migration
{
    public function up(): void
    {
        Schema::create('automation_steps', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Automation::class)->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('name');
            $table->json('value');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('automation_steps');
    }
}
