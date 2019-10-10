<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ticket_api_id');
            $table->string('ticket_name');
            $table->string('ticket_category');
            $table->string('ticket_venue');
            $table->unsignedBigInteger('performer_id');
            $table->timestamps();

            $table->foreign('performer_id')
               ->references('id')
               ->on('performers')
               ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
