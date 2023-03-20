<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Classes\Enums\UserTypesEnum;
use App\Classes\Enums\StatusEnum;

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
            $table->string('name');
            $table->string('phone')->unique()->nullable();
            $table->string('avatar')->nullable();
            $table->integer('otp')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_agree_tos')->default(false);
            $table->boolean('is_phone_verified')->default(false);
            $table->boolean('is_email_verified')->default(false);
            $table->string('user_type')->default(UserTypesEnum::User);
            $table->string('status')->default(StatusEnum::Inactive);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
