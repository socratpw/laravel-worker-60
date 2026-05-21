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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->index()->constrained();

            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->integer('age')->nullable();
            $table->text('description')->nullable();
           $table->softDeletes();

            $table->boolean('is_married')->default(false);


            $table->timestamps();

//            $table->foreignId('position_id')->nullable()->index()->constrained('positions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
