<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evolution_trigger_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->ForeignIdFor(App\Models\EvolutionTrigger::class)->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evolution_trigger_translations');
    }
};
