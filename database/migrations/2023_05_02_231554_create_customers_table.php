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
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = "innodb";
            $table->id();
            $table->string('firstname', 30);
            $table->string('lastname', 30)->index();
            $table->string('email', 50)->unique()->index();
            $table->string('legal_counsel', 100);
            $table->date('profile_date');
            $table->date('dob');
            $table->string('passport')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
