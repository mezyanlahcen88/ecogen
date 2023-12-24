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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('product_code')->unique();
            $table->string('name_fr');
            $table->string('name_ar');
            $table->foreignUuid('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignUuid('scategory_id')->constrained('categories')->onDelete('cascade');
            $table->double('buy_price',8,2);
            $table->double('price_unit',8,2);
            $table->double('price_gros',8,2);
            $table->double('price_reseller',8,2);
            $table->tinyInteger('remise');
            $table->tinyInteger('tva');
            $table->tinyInteger('min_stock');
            $table->string('unite');
            $table->string('bar_code');
            $table->boolean('stockable');
            $table->string('created_by');
            $table->string('stock_methode')->comment('CMUP/FIFO/LIFO');
            $table->string('archive');
            $table->foreignUuid('brand_id')->constrained()->onDelete('cascade');
            $table->string('picture');
            $table->foreignUuid('warehouse_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};

