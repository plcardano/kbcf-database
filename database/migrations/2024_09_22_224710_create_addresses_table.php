<?php

use App\Models\People\People;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(People::class);
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('region');
            $table->string('region_code');
            $table->string('province');
            $table->string('province_code');
            $table->string('city');
            $table->string('city_code');
            $table->string('barangay');
            $table->string('barangay_code');
            $table->unsignedTinyInteger('address_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
