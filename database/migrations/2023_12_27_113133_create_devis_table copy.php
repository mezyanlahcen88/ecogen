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
        Schema::create('devis', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('devis_code')->unique();
            $table->double('HT',8,2);
            $table->tinyInteger('TVA');
            $table->double('TTTC',8,2);
            $table->string('status');
            $table->date('status_date');
            $table->boolean('active')->default(1);
            $table->foreignUuid('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->text('comment');
            $table->date('created_at');
            $table->date('updated_at');
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
        Schema::dropIfExists('devis');
    }
};

