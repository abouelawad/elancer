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
        Schema::create('freelancers', function (Blueprint $table) {

            $table->foreignId('user_id')->primary()
                    ->constrained('users')
                    ->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('country')->nullable();
            $table->boolean('verified')->default(0);
            $table->unsignedFloat('hourly_rate')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
