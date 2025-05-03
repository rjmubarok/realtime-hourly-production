<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('CASCADE');
            $table->unsignedBigInteger('line_id');
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('CASCADE');
            $table->string('today_target', 191);
            $table->string('total_target', 191);
            $table->string('total_production', 191);
            $table->string('finishing_receive', 191);
            $table->string('man_power', 191);
            $table->string('buyer_name', 191);
            $table->string('style', 191);
            $table->string('run_day', 191);
            $table->string('order_qty', 191);
            $table->string('color', 191);
            $table->string('po', 191);
            $table->string('smv', 191);
            $table->text('comments')->nullable();
            $table->integer('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('general_infos');
    }
}
