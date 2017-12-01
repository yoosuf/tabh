<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('nice_name')->nullable();
            $table->string('iso')->nullable();
            $table->string('iso3')->nullable();
            $table->string('phone_code')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('user_type', 1)->default('W');
            $table->rememberToken();
            $table->jsonb('preferences')->default("{}");
            $table->boolean('activated')->default(false);
            $table->boolean('banned')->default(false);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->boolean('verified_email')->default(false);
            $table->boolean('send_welcome_email')->default(false);
            $table->boolean('banned')->default(false);
            $table->jsonb('preferences')->default("{}");
            $table->timestamps();
        });



        Schema::create('auth_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('provider_id')->index();
            $table->string('provider_name');
            $table->timestamp('created_at')->nullable();
        });


        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('addressable');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->boolean('default')->default(false);
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


//        Schema::table('addresses', function (Blueprint $table) {
//            $table->dropForeign('addresses_country_id_foreign');
//        });
        Schema::dropIfExists('addresses');



        Schema::table('auth_providers', function (Blueprint $table) {
            $table->dropForeign('auth_providers_user_id_foreign');
        });
        Schema::dropIfExists('auth_providers');


//        Schema::table('profiles', function (Blueprint $table) {
//            $table->dropForeign('profiles_user_id_foreign');
//        });
//        Schema::dropIfExists('profiles');

        Schema::dropIfExists('countries');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('users');



    }
}
