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
        Schema::create('pay_stack_accounts', function (Blueprint $table) {
            $table->id();
            $table->double('opening_balance');
            $table->double('debit');
            $table->double('credit');
            $table->double('pending_balance');
            $table->double('paid_out');
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
        Schema::dropIfExists('pay_stack_accounts');
    }
};
