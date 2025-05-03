<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourlyproductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hourlyproductions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id')->nullable();
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('CASCADE');
            $table->unsignedBigInteger('line_id')->nullable();
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('CASCADE');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('CASCADE');
            $table->float('first')->nullable();
            $table->float('second')->nullable();
            $table->float('third')->nullable();
            $table->float('fourth')->nullable();
            $table->float('fifth')->nullable();
            $table->float('sixth')->nullable();
            $table->float('seventh')->nullable();
            $table->float('eighth')->nullable();
            $table->float('ninth')->nullable();
            $table->float('tenth')->nullable();
            $table->float('eleventh')->nullable();
            $table->float('twelfth')->nullable();
            $table->float('thirteenth')->nullable();
            $table->float('fourteenth')->nullable();
            $table->float('hourly_tar')->nullable();
            $table->float('day_tar')->nullable();
            $table->string('style')->nullable();
            $table->string('buyer')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('hourlyproductions');
    }
}
