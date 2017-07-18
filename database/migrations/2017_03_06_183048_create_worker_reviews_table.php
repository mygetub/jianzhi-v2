<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_reviews', function (Blueprint $table) {

            $table->tinyInteger('attitude_star');//工作态度评分
            $table->tinyInteger('ablility_star');//工作能力评分
            $table->tinyInteger('description_match');//描述相符打分
            $table->text('content')->nullable();
            $table->string('pic_path')->nullable();
            $table->integer('work_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['work_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('worker_reviews');
    }
}
