<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignkeyMedicineTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicine_transactions', function(Blueprint $table) {
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicine_transactions', function (Blueprint $table) {
            $table->dropForeign(['medicine_id']);
            $table->dropForeign(['transaction_id']);
        });
    }
}
