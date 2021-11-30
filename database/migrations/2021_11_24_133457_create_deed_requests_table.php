<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeedRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deed_requests', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('deed_no');
            $table->string('deed_type');
            $table->date('request_date');
            $table->string('payment_status');
            $table->string('note');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deed_requests');
    }
}
