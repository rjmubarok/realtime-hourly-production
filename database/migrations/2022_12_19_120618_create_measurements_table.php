<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('CASCADE');
            $table->unsignedBigInteger('line_id');
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('CASCADE');
            $table->unsignedBigInteger('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('CASCADE');
            $table->text('style')->nullable();
            $table->text('po')->nullable();
            $table->text('jacket_pant')->nullable();

            $table->text('cheat')->nullable();
            $table->text('bottom_sweep')->nullable();
            $table->text('sleeve_lenght')->nullable();
            $table->text('across_shouler')->nullable();
            $table->text('armhole')->nullable();
            $table->text('center_back_lenght')->nullable();
            $table->text('hood_length')->nullable();
            $table->text('hood_width')->nullable();


            $table->text('waist')->nullable();
            $table->text('hip_seat')->nullable();
            $table->text('inseam')->nullable();
            $table->text('front_rise')->nullable();
            $table->text('seat')->nullable();
            $table->text('thigh')->nullable();
            $table->text('back_rise')->nullable();

            $table->string('aw_bw')->nullable();
            $table->string('size')->nullable();


            $table->string('tolarance')->nullable();
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
        Schema::dropIfExists('measurements');
    }
}
