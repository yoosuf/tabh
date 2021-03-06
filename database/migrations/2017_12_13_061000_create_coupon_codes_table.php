<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 32)->unique();
            $table->enum('reward_type', ['fixed', 'percent'])->default('fixed');
            $table->string('reward')->nullable();
            $table->text('data')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('coupon_code_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('coupon_code_id');

            $table->timestamp('used_at')->nullable();
            $table->primary(['user_id', 'coupon_code_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('coupon_code_id')->references('id')->on('coupon_codes');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('coupon_code_user', function (Blueprint $table) {
            $table->dropForeign('coupon_code_user_user_id_foreign');
            $table->dropForeign('coupon_code_user_coupon_code_id_foreign');
        });
        Schema::dropIfExists('coupon_code_user');

        Schema::dropIfExists('coupon_codes');

    }
}
