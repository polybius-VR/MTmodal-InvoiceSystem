<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_receipts', function (Blueprint $table) {
            $table->string('number_id')->unique();
            $table->date('date_of_issue');
            $table->string('invoice_id');
            $table->foreign('invoice_id')->references('number_id')->on('receivable_invoices');
            $table->decimal('amount', 8, 4);
            $table->primary(array('number_id', 'invoice_id'));
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
        Schema::dropIfExists('cash_receipts');
    }
}
