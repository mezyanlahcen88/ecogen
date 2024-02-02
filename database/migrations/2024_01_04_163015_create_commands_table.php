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
        Schema::create('commands', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('command_code')->unique();
            $table->double('HT',8,2);
            $table->integer('TVA');
            $table->double('TTTC',8,2);
            $table->double('total_payant',8,2);
            $table->double('total_restant',8,2);
            $table->string('status');
            $table->timestamp('status_date');
            $table->boolean('active')->default(1);
            $table->foreignUuid('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->text('comment');
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
        Schema::dropIfExists('commands');
    }
};

