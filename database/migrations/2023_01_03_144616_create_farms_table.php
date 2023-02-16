<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onUpdate('cascade');
            $table->string('name', 50);
            $table->string('owner', 50);
            $table->enum('type_livestock', [
                'Broiler',
                'Layer',
                'Swine',
                'Duck',
                'Quail',
            ]);
            $table->string('regional', 30);
            $table->string('subregional', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
};
