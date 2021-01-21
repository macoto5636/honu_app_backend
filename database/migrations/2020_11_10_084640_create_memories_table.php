<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memories', function (Blueprint $table) {
            $table->id();
            $table->string('memory_title');
            $table->integer('public_flag');
            $table->double('memory_latitude', 20, 14);
            $table->double('memory_longitude', 20, 14);
            $table->string('memory_adress');
            $table->string('thumbnail_path');
            $table->integer('memory_good');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('memory_music')->nullable();
            $table->string('time_message_video_path')->nullable();
            $table->dateTime('playback_at')->nullable();
            $table->dateTime('reservation_at');
            $table->dateTime('scheduled_at');
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memories');
    }
}
