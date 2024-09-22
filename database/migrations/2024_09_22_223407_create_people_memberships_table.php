<?php

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
        Schema::create('people_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(People::class);
            $table->string('former_church')->nullable();
            $table->string('former_church_address')->nullable();
            $table->year('year_attended')->nullable();
            $table->foreignIdFor(People::class, 'inviter_id')->nullable();
            $table->string('inviter')->nullable();
            $table->boolean('membership_class')->default(false);
            $table->date('membership_class_date')->nullable();
            $table->foreignIdFor(People::class, 'membership_class_facilitator_id')->nullable();
            $table->date('membership_date')->nullable();
            $table->boolean('kbcf_sof')->default(false);
            $table->boolean('church_covenant')->default(false);
            $table->boolean('members_covenant')->default(false);
            $table->boolean('notified_former_church')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_memberships');
    }
};
