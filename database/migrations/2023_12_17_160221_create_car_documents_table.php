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
        Schema::create('car_documents', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignUuid('car_id')->constrained('cars')->onDelete('cascade');
            $table->string('nature');
            $table->string('tranche')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->string('picture')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('car_documents');
    }
};
