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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->decimal("price", 8, 2);
            $table->string("nom");
            $table->string("email");
            $table->string("tel");
            $table->unsignedBigInteger("user");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("ville_id");

            $table->enum('status', ['pending', 'valid', 'refuse'])
                ->default('pending');

            $table->foreign("user")->references("id")->on("users")
                ->onUpdate('cascade');

            $table->foreign("category_id")->references("id")->on("categories")
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign("ville_id")->references("id")->on("villes")
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
