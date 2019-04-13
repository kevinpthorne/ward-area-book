<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('companionships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at');
            $table->integer("missionary_1");
            $table->integer("missionary_2");
            $table->integer("missionary_3")->nullable();
            $table->string("name")->nullable();

            $table->foreign('missionary_1')->references('id')->on('users');
            $table->foreign('missionary_2')->references('id')->on('users');
            $table->foreign('missionary_3')->references('id')->on('users');
        });

        Schema::create('persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string("type", 50);
            $table->string("address");
            $table->string("phone");

            $table->text("background_information");

            $table->timestamp("datetime_initial_contact")->nullable();
            $table->timestamp("datetime_scheduled_baptism")->nullable();
            $table->timestamp("datetime_actual_baptism")->nullable();
            $table->timestamp("datetime_actual_confirmation")->nullable();

            $table->timestamps();
        });

        Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('datetime_visited');
            $table->boolean("met");
            $table->text("visit_summary");
            $table->boolean("attended_church_this_week")->nullable();
            $table->string("record_of_bom_reading", 20)->nullable();
            $table->timestamps();

            $table->integer("person_id")->nullable();

            $table->foreign('person_id')->references('id')->on('persons');
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 15);
            $table->integer("leader_user_id");
            $table->timestamps();

            $table->foreign('leader_user_id')->references('id')->on('users');
        });

        Schema::create('district_has_companionship', function (Blueprint $table) {
            $table->integer("district_id");
            $table->integer("companionship_id");
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('companionship_id')->references('id')->on('companionships');
        });

        Schema::create('companionship_has_person', function (Blueprint $table) {
            $table->integer("person_id");
            $table->integer("companionship_id");
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('companionship_id')->references('id')->on('companionships');
        });

        Schema::create('visit_attendees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("visit_id");
            $table->integer("user_id");

            $table->foreign('visit_id')->references('id')->on('visits');
            $table->foreign('user_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_attendees', function(Blueprint $table)
        {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['visit_id']);
        });
        Schema::table('companionship_has_person', function(Blueprint $table)
        {
            $table->dropForeign(['companionship_id']);
            $table->dropForeign(['person_id']);
        });
        Schema::table('district_has_companionship', function(Blueprint $table)
        {
            $table->dropForeign(['companionship_id']);
            $table->dropForeign(['district_id']);
        });
        Schema::table('districts', function(Blueprint $table)
        {
            $table->dropForeign(['leader_user_id']);
        });
        Schema::table('visits', function(Blueprint $table)
        {
            $table->dropForeign(['person_id']);
        });
        Schema::table('companionships', function(Blueprint $table)
        {
            $table->dropForeign(['missionary_3']);
            $table->dropForeign(['missionary_2']);
            $table->dropForeign(['missionary_1']);
        });


        Schema::dropIfExists('visit_attendees');
        Schema::dropIfExists('companionship_has_person');
        Schema::dropIfExists('district_has_companionship');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('visits');
        Schema::dropIfExists('persons');
        Schema::dropIfExists('companionships');

        Schema::disableForeignKeyConstraints();
    }
}
