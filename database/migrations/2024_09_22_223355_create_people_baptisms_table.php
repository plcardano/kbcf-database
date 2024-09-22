<?php

use App\Models\People\People;
use App\Models\People\PeopleBaptism;
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
        Schema::create('people_baptisms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(People::class);
            $table->date('spiritual_birth_date')->nullable();
            $table->boolean('baptismal_class')->default(false);
            $table->date('baptismal_class_date')->nullable();
            $table->foreignIdFor(People::class, 'baptismal_class_facilitator_id')->nullable();
            $table->date('baptismal_date')->nullable();
            $table->foreignIdFor(People::class, 'baptismal_minster_id')->nullable();
            $table->string('church_baptism_facilitator')->nullable();
            $table->string('church_facilitator_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_baptisms');
    }
};
