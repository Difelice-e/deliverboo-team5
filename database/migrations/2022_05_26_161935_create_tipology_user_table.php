<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipologyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipology_user', function (Blueprint $table) {
            $table->unsignedBigInteger('tipology_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            // add foreign key 
            $table->foreign('tipology_id')
                ->references('id')
                ->on('tipologies')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->primary(['user_id','tipology_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipology_user');
    }
}
