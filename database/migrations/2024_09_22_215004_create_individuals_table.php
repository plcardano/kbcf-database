<?php

use App\Enums\Gender;
use App\Enums\CivilStatus;
use App\Enums\AttenderType;
use App\Enums\IndividualStatus;
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
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('nickname')->nullable();
            $table->date('birth_date');
            $table->unsignedTinyInteger('gender')->comment(Gender::class);
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('telephone_number')->nullable();
            $table->unsignedTinyInteger('civil_status')->comment(CivilStatus::class);
            $table->boolean('is_active')->default(false);
            $table->string('occupation')->nullable();
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->unsignedTinyInteger('status')->comment(IndividualStatus::class);
            $table->unsignedTinyInteger('type')->comment(AttenderType::class);
            $table->boolean('waiver_signed')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual');
    }
};
