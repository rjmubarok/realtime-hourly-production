<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('CASCADE');
            $table->unsignedBigInteger('line_id');
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('CASCADE');
            $table->string('name');
            $table->string('salary')->nullable();
            $table->string('status', 16)->default(1)->comment('1 = Active & 0 = Inactive');
            
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
        Schema::dropIfExists('operators');
    }
}
