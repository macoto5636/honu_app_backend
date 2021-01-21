<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name');
            $table->unsignedBigInteger('shop_category_id');
            $table->dateTime('open_time');
            $table->dateTime('close_time');
            $table->string('regular_holiday');
            $table->unsignedBigInteger('shop_tel');
            $table->string('shop_adress');
            $table->double('shop_latitude', 10, 7);
            $table->double('shop_longitude', 10, 7);
            $table->unsignedBigInteger('memory_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('image');
            $table->string('detail');
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('memory_id')
                    ->references('id')
                    ->on('memories')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
