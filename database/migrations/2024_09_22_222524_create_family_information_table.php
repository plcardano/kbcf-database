<?php

use App\Enums\FamilyRelation;
use App\Enums\Gender;
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
        Schema::create('family_information', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Individual::class);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('nickname')->nullable();
            $table->date('birth_date');
            $table->unsignedTinyInteger('gender')->comment(Gender::class);
            $table->unsignedTinyInteger('relation')->comment(FamilyRelation::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_information');
    }
};
