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
        Schema::create('garanties', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->double('amount', 8, 2)->nullable();
            $table->string('parent_id');
            $table->string('parent_type')->comment('Client/Supplier');
            $table->string('type')->comment('CHEQUE/ESPECE');
            $table->string('picture')->nullable();
            $table->string('document_ref')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('comment')->nullable();
            $table->date('doe')->comment('experation date');
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
        Schema::dropIfExists('garanties');
    }
};

