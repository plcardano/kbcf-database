<?php

use App\Models\Event\Event;
use App\Enums\AttendanceType;
use App\Models\Individuals\Individual;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Individual::class);
            $table->foreignIdFor(Event::class);
            $table->unsignedTinyInteger('status')->comment(AttendanceType::class);
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
