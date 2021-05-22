<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('profile_avatar', 100)->nullable();
            $table->string('profile_first_name', 100)->nullable();
            $table->string('profile_last_name', 100)->nullable();
            $table->integer('profile_date_of_birth')->nullable();
            $table->string('profile_month_of_birth', 32)->nullable();
            $table->integer('profile_year_of_birth')->nullable();
            $table->string('profile_phone', 32)->nullable();
            $table->string('profile_street', 200)->nullable();
            $table->string('profile_city', 200)->nullable();
            $table->string('profile_country', 100)->nullable();
            $table->string('profile_website', 100)->nullable();
            $table->string('profile_email', 100)->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
