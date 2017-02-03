<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoalbumItemTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoalbum_item_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photoalbum_item_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();

            $table->unique(['photoalbum_item_id', 'locale']);
            $table->foreign('photoalbum_item_id')->references('id')->on('photoalbum_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photoalbum_item_translations');
    }
}
