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
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('matricule')->unique();
            $table->string('marque')->nullable();
            $table->string('type')->nullable();
            $table->date('dae')->comment('date of enter')->nullable();
            $table->string('consommation')->nullable();
            $table->string('tonnage')->nullable();
            $table->string('obs')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};

