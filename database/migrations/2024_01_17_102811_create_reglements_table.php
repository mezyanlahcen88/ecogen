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
        Schema::create('reglements', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignUuid('command_id')->constrained()->onDelete('cascade');
            $table->string('ref_reg');
            $table->timestamp('date_reg');
            $table->double('amount_reg',8,2);
            $table->string('mode_reg')->comment('espece,virement');
            $table->string('nature_reg')->comment('achat,vente');
            $table->string('parent_type')->comment('supplier,client');
            $table->uuid('parent_id');
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();
        });

        // Créer un index composé sur plusieurs colonnes
        //Schema::table('reglements', function (Blueprint $table) {
        //    $table->index(['status', 'visibility']);
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reglements');
    }
};

