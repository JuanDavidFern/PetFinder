<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('type');
            $table->text('characteristics')->nullable();
            $table->text('information')->nullable();
            $table->string('photo')->nullable(); // URL de la foto del animal
            $table->integer('sponsors_count')->default(0);
            $table->unsignedBigInteger("current_owner_id");
            $table->foreign("current_owner_id")->references("id")->on("users")->onDelete("cascade");
            $table->softDeletes(); // Añade la columna para SoftDeletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
