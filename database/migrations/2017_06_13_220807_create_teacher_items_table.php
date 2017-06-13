<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->boolean('status')->default(true);
            $table->integer('position')->unsigned()->default(0);

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('teacher_item_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_item_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->text('content')->nullable();

            $table->unique(['locale', 'teacher_item_id']);
            $table->foreign('teacher_item_id')->references('id')->on('teacher_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teacher_item_translations');
        Schema::drop('teacher_items');
    }
}
