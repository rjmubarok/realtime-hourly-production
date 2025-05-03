<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_checks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('CASCADE');
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('CASCADE');
            $table->unsignedBigInteger('line_id');
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('CASCADE');
            $table->unsignedBigInteger('defect_code_id')->nullable();
            $table->foreign('defect_code_id')->references('id')->on('defect_codes')->onDelete('CASCADE');
            $table->string('output');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('po')->nullable();
            $table->string('process')->nullable();
            $table->string('mc')->nullable();
            $table->string('defect_code')->nullable();
            $table->string('defect_quantity')->nullable();
            $table->string('style')->nullable();
            $table->string('op_name')->nullable();
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
        Schema::dropIfExists('quality_checks');
    }
}
