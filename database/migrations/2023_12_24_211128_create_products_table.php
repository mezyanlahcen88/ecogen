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
            $table->double('latest_price',8,2);
            $table->integer('remise');
            $table->integer('tva');
            $table->integer('min_stock');
            $table->string('unite');
            $table->string('bar_code');
            $table->boolean('stockable')->default(0);
            $table->string('created_by');
            $table->string('stock_methode')->comment('CMUP/FIFO/LIFO');
            $table->string('archive')->default(0);
            $table->foreignUuid('brand_id')->constrained()->onDelete('cascade');
            $table->string('picture')->nullable();
            $table->foreignUuid('warehouse_id')->constrained()->onDelete('cascade');
            $table->boolean('active')->default(1);
            // $table->timestamps();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
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

