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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('reglement');
            $table->string('compte');
            $table->string('picture')->nullable();
            $table->string('nature');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('payments');
    }
};

