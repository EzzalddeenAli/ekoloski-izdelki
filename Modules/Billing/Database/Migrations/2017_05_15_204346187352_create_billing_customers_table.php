<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing__customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('email')->unique();
            $table->integer('user_id');

            $table->boolean('newsletter_active');

            // newsletter registration
            $table->string('newsletter_token');
            $table->timestamp('newsletter_registration_at');
            $table->string('newsletter_registration_ip');

            // newsletter confirmation DOI
            $table->boolean('newsletter_confirmed');
            $table->timestamp('newsletter_confirmed_at');
            $table->string('newsletter_confirm_ip');

            // newsletter unsubscription
            $table->timestamp('newsletter_unsubscribed_at');
            $table->string('newsletter_unsubscribe_ip');

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
        Schema::dropIfExists('billing__customers');
    }
}
