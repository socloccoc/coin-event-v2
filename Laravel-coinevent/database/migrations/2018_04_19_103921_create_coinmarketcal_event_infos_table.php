<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinmarketcalEventInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinmarketcal_event_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->length(8);
            $table->integer('category_id')->length(4);
            $table->string('coin_name', 150);
            $table->string('symbol', 50);
            $table->string('meeting_name', 150);
            $table->text('source_url');
            $table->text('content_event_en');
            $table->text('content_event_ja');
            $table->string('image_url',150);
            $table->string('date',100);
            $table->string('date_convert_timestamp',50);
            $table->string('date_filter',50);
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
        Schema::dropIfExists('coinmarketcal_event_infos');
    }
}
