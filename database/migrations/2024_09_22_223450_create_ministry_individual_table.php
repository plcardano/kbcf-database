<?php

use App\Models\Ministry\Ministry;
use App\Models\Individuals\Individual;
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
        Schema::create('ministry_individual', function (Blueprint $table) {
            $table->foreignIdFor(Ministry::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Individual::class)->constrained()->cascadeOnDelete();

            $table->index(['ministry_id','individual_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministry_individual');
    }
};
