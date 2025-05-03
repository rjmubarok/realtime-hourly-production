<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorSkillMetrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operator_skill_metrixes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('CASCADE');
            $table->unsignedBigInteger('line_id');
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('CASCADE');
            $table->unsignedBigInteger('operator_id');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('CASCADE');
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('CASCADE');

            $table->string('salary')->nullable();
            $table->string('propose_salary')->nullable();
            $table->string('ol')->nullable();
            $table->string('ol_performance')->nullable();
            $table->string('snls')->nullable();
            $table->string('snls_performance')->nullable();
            $table->string('vertical')->nullable();
            $table->string('vertical_performance')->nullable();
            $table->string('dnls')->nullable();
            $table->string('dnls_performance')->nullable();
            $table->string('kansai')->nullable();
            $table->string('foa')->nullable();
            $table->string('snap')->nullable();
            $table->string('bh')->nullable();
            $table->string('bt')->nullable();
            $table->string('cs')->nullable();
            $table->string('performance')->nullable();
            $table->string('join_date')->nullable();
            $table->string('main_process')->nullable();
            $table->string('present_work')->nullable();
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
        Schema::dropIfExists('operator_skill_metrixes');
    }
}
