<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createposttable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
            $table->string('person_name', 50)->nullable();
            $table->date('date_of_death')->nullable();
            $table->string('relation', 50)->nullable();
            $table->string('number', 12)->nullable();
            $table->integer('approval_status')->default(411)->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
