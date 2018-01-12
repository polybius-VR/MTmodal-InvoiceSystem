<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoidedInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voided_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_id');
            $table->foreign('invoice_id')->references('number_id')->on('receivable_invoices');
            $table->dateTime('date_voided');
            $table->text('description');
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
        Schema::dropIfExists('voided_invoices');
    }
}
