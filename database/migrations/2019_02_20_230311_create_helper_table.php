<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helper', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('profile_id')->unsigned()->index();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->integer('edition_id')->unsigned()->index();
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade');

            $table->unique(['profile_id', 'edition_id']);

            $table->string('phone_provider', 50)->nullable();
            $table->boolean('legal_age');
            $table->boolean('first_responder');
            $table->string('driving_license')->nullable();
            $table->string('driving_license_location')->nullable();
            $table->string('prefered_activity', 30)->nullable();
            $table->string('housing', 50)->nullable();
            $table->string('prefered_sector', 10)->nullable();
            $table->text('comment')->nullable();

            // TODO: refactor to separate table (custom fields)
            $table->boolean('sleep_day_before');
            $table->boolean('day_before_meal');
            $table->boolean('after_event_meal');

            $table->boolean('active');

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
        Schema::dropIfExists('helper');
    }
}
