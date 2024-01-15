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
        Schema::create('product_devis', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignUuid('devis_id')->constrained('devis')->onDelete('cascade');
            $table->foreignUuid('product_id')->constrained('products')->onDelete('cascade');
            $table->string('designation');
            $table->integer('quantity');
            $table->double('price',8,2);
            $table->integer('remise');
            $table->integer('total_remise');
            $table->double('TOTAL_HT',8,2);
            $table->integer('TVA');
            $table->integer('TOTAL_TVA');
            $table->double('TOTAL_TTC',8,2);
            $table->string('unite');
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
        Schema::dropIfExists('product_devis');
    }
};

