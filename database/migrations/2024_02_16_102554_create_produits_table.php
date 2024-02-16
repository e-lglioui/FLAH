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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->integer('prix');
            $table->integer('quantite');
            //foring key categorie
            $table->integer('category')->unsigned()->index()->nullable();
            $table->foreign('category')->references('id')->on('categorie')->onDelete('cascade');
              //foring key table forniseur
            $table->integer('owner')->unsigned()->index()->nullable();
            $table->foreign('owner')->references('id')->on('forniseur')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
