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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('rec_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->default('in progress');
            $table->unsignedBigInteger('user_id')->nullable(); // Modifier en nullable si la commande peut être faite sans utilisateur
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity'); // Ajouter la colonne quantity

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Modifier en set null si l'utilisateur peut être null
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
