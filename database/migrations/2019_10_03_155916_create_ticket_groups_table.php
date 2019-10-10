<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ticket_group_api_id');
            $table->string('ticket_group_section');
            $table->integer('ticket_group_quantity');
            $table->float('ticket_group_wholesale');
            $table->unsignedBigInteger('ticket_id');
            $table->timestamps();

            $table->foreign('ticket_id')
               ->references('id')
               ->on('tickets')
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
        Schema::dropIfExists('ticket_groups');
    }
}
