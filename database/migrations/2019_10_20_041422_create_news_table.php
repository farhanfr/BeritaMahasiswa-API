<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->Increments('news_id');
            $table->integer('category_news_id')->unsigned();
            $table->foreign('category_news_id')->references('category_news_id')->on('category_news');
            $table->string('news_title');
            $table->text('news_content');
            $table->string('news_img');
            $table->date('date_published');
            $table->enum('news_tipe',array('new','top','regular'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
