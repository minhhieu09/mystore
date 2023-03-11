<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_models', function (Blueprint $table) {
            $table->id();
            protected $table = 'cart_models';

    public $fillable = [
        'order_id',
        'component_id',
        'amount',
        'customer_id',
        'total',
        'payment_type',
        'payment_infor',
        'status',
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
        Schema::dropIfExists('payment_models');
    }
}
