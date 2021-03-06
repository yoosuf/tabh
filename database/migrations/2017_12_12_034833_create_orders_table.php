<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('cart_identifier');
            $table->string('total_amount');
            $table->string('total_discount');
            $table->string('tax');
            $table->jsonb('meta')->default("{}");
            $table->string('status')->default('initiated');
            $table->boolean('is_approved_by_admin')->default(false);
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


        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_user_id_foreign');
//            $table->dropForeign('orders_address_id_foreign');
//            $table->dropForeign('orders_attachment_id_foreign');
        });

        Schema::dropIfExists('orders');
    }
}
