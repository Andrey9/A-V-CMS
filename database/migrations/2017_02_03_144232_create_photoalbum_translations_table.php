<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoalbumTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoalbum_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photoalbum_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('short_content')->nullable();
            $table->text('content')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->unique(['photoalbum_id', 'locale']);
            $table->foreign('photoalbum_id')->references('id')->on('photoalbums')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photoalbum_translations');
    }
}
