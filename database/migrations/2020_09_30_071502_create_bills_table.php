<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number_bill')->nullable(true);
            $table->text('detail')->nullable(true);
            $table->text('cevita')->nullable(true);
            $table->text('celery')->nullable(true);
            $table->text('orinca_coffee')->nullable(true);
            $table->text('products_value_discount')->nullable(true);
            $table->text('discount')->nullable(true);
            $table->text('vat')->nullable(true);
            $table->text('net_total')->nullable(true);
            $table->text('total')->nullable(true);
            $table->text('shipping_cost')->nullable(true);
            $table->string('status')->nullable(true);
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
        Schema::dropIfExists('bills');
    }
}