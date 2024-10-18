<?php

use App\Enums\DisciplerStatus;
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
        Schema::create('discipleship_involvements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Individual::class);
            $table->year('year_start');
            $table->year('year_end');
            $table->foreignIdFor(Individual::class, 'discipler_id')->nullable();
            $table->string('discipler_name')->nullable();
            $table->unsignedTinyInteger('is_discipler')->comment(DisciplerStatus::class);
            $table->string('assistant_leader')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discipleship_involvements');
    }
};
