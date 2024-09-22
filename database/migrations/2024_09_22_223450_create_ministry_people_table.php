<?php

use App\Models\Ministry\Ministry;
use App\Models\People\People;
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
        Schema::create('ministry_people', function (Blueprint $table) {
            $table->foreignIdFor(Ministry::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(People::class)->constrained()->cascadeOnDelete();

            $table->index(['ministry_id','people_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministry_people');
    }
};
