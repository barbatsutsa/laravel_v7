<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesHasNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources_has_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sources_id');
            $table->unsignedBigInteger('news_id');

            $table->foreign('sources_id')->references('id')
                ->on('sources')->onDelete('cascade');
            $table->foreign('news_id')->references('id')
                ->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sources_has_news');
    }
}
