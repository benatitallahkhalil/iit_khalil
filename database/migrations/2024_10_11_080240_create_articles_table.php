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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 100)->unique();
            $table->string('reference', 50)->index();
            $table->string('marque', 50)->nullable();
            $table->integer('qtStock')->unsigned();
            $table->decimal('prix', 8, 2);
            $table->string('imageArt', 200)->nullable(); 
            $table->unsignedBigInteger('scategorieID');  // Foreign key column
            $table->foreign('scategorieID')
                  ->references('id')
                  ->on('scategories')  // Correct table name
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
