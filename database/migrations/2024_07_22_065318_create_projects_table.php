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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->cascadeOnDelete();
                    
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->cascadeOnDelete();

            
            $table->text('description');
            $table->enum('status',['open','in progress','closed']);
            $table->enum('type',['hourly','fixed'])->nullable();
            $table->unsignedFloat('budget')->nullable(); //TODO - change to  >$table->decimal('budget', 12, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
