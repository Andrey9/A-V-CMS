<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template')->unsigned()->default(1);
            $table->text('logo')->nullable();
            $table->integer('menu_id')->unsigned()->default(1);
            $table->boolean('feedback')->default(1);
        });

        Schema::create('dashboard_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dashboard_id')->unsigned();
            $table->string('locale')->index();
            $table->text('footer')->nullable();

            $table->unique(['dashboard_id', 'locale']);
            $table->foreign('dashboard_id')->references('id')->on('dashboards')->onDelete('cascade')->onUpdate('cascade');
        });

        $id = DB::table('dashboards')->insertGetId(
            [
                'template' => 1
            ]
        );

        DB::table('dashboard_translations')->insert([['dashboard_id' => $id, 'footer' => 'Футер', 'locale' => 'ru']]);
        DB::table('dashboard_translations')->insert([['dashboard_id' => $id, 'footer' => 'Футер', 'locale' => 'ua']]);
        DB::table('dashboard_translations')->insert([['dashboard_id' => $id, 'footer' => 'Footer', 'locale' => 'en']]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dashboard_translations');
        Schema::drop('dashboards');
    }
}
