<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOpeningTimeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item__openingtime_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('openingtime_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['openingtime_id', 'locale']);
            $table->foreign('openingtime_id')->references('id')->on('item__openingtimes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item__openingtime_translations', function (Blueprint $table) {
            $table->dropForeign(['openingtime_id']);
        });
        Schema::dropIfExists('item__openingtime_translations');
    }
}
