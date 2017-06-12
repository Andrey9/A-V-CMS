<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('position')->unsigned()->default(0);
        });

        Schema::create('teacher_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale');
            $table->integer('teacher_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->unique(['teacher_id', 'locale']);
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teacher_translations');
        Schema::drop('teachers');
    }
}
