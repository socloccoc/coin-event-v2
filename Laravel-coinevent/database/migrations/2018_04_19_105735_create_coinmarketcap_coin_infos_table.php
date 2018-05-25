<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinmarketcapCoinInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinmarketcap_coin_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coin_name', 150);
            $table->string('symbol', 50);
            $table->string('price', 50);
            $table->string('market_cap', 50);
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
        Schema::dropIfExists('coinmarketcap_coin_infos');
    }
}
