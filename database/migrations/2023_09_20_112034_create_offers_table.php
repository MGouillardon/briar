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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Property::class, 'property_id')->constrained('properties')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class, 'bidder_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedInteger('amount');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign(['property_id']);
            $table->dropForeign(['bidder_id']);
        });
        Schema::dropIfExists('offers');
    }
};
