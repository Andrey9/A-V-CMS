<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoalbumItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoalbum_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photoalbum_id')->unsigned();
            $table->string('image')->nullable();
            $table->integer('position')->unsigned();
            $table->boolean('status')->default(true);
            $table->timestamps();

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
        Schema::drop('photoalbum_items');
    }
}
