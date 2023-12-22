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
        Schema::create('drivers', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('permis_number',50)->nullable();
            $table->string('permis_type',50)->nullable();
            $table->string('cin',50)->nullable();
            $table->date('dob')->nullable();
            $table->string('obs')->nullable();
            $table->text('picture',50)->comment('for cni or passport')->nullable();
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('drivers');
    }
};

