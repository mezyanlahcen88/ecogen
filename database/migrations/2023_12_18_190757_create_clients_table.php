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
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('code_client');
            $table->string('ice');
            $table->string('name_ar');
            $table->string('name_fr');
            $table->integer('fonction')->nullable();
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('type_client')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('ville_id')->nullable();
            $table->integer('secteur_id')->nullable();
            $table->string('cd_postale')->nullable();
            $table->text('address')->nullable();
            $table->text('obs')->nullable();
            $table->string('created_by');
            $table->integer('remise')->nullable();
            $table->double('total_garanties',8,2)->default(0.00);
            $table->string('parent_type')->nullable();
            $table->string('parent_id')->nullable();
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
        Schema::dropIfExists('clients');
    }
};

