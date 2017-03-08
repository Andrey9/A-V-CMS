<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'pages',
            function (Blueprint $table) {
                $table->increments('id');

                $table->string('slug', 255);
                $table->string('image', 255)->nullable();
                $table->string('external_url', 255)->nullable();
                $table->integer('position')->unsigned();
                $table->boolean('status')->default(true);
                $table->text('contents')->nullable();
                $table->integer('template_id')->default(1);

                $table->timestamps();
            }
        );

        Schema::create(
            'page_translations',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('page_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name')->nullable();

                $table->string('meta_title')->nullable();
                $table->string('meta_keywords')->nullable();
                $table->text('meta_description')->nullable();

                $table->unique(['page_id', 'locale']);
                $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade')->onUpdate('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('page_translations');
        Schema::drop('pages');
    }
}