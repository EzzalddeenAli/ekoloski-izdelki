<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingSubscriptionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing__subscription_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('subscription_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['subscription_id', 'locale']);
            $table->foreign('subscription_id')->references('id')->on('billing__subscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billing__subscription_translations', function (Blueprint $table) {
            $table->dropForeign(['subscription_id']);
        });
        Schema::dropIfExists('billing__subscription_translations');
    }
}
