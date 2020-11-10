<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('friend_id')->nullable();
            $table->unsignedBigInteger('memory_id');

            $table->foreign('friend_id')
                    ->references('id')
                    ->on('friends')
                    ->onDelete('set null');

            $table->foreign('memory_id')
                    ->references('id')
                    ->on('memories')
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
        Schema::dropIfExists('members');
    }
}
