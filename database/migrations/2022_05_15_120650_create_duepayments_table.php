<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duepayments', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('order_id');
            $table->string('payment_amount');
            $table->string('payBy');
            $table->string('pay_date');
            $table->string('pay_month');
            $table->string('pay_year');
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
        Schema::dropIfExists('duepayments');
    }
}
