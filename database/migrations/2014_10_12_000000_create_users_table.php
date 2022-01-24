<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->decimal('price', 20, 2)->default(0);
            $table->string('slug')->unique()->nullable();
            $table->text('summary')->nullable();
            $table->bigInteger('meli_code')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->integer('city_code')->nullable();
            $table->bigInteger('fixed_number')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('national_card')->nullable();
            $table->text('last_education')->nullable();
            $table->text('supplementary_training')->nullable();
            $table->tinyInteger('validationable')->default(0)->comment('0 => unvalid, 1 => valid');
            $table->tinyInteger('activation')->default(0)->comment('0 => inactive, 1 => active');
            $table->timestamp('activation_date')->nullable();
            $table->tinyInteger('user_type')->default(0)->comment('0 => user, 1 => admin , 2 => teacher');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
