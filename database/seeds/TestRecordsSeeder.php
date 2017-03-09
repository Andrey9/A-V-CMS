<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++){
            $id = DB::table('banners')->insertGetId(
                [
                    'layout_position' => $i,
                    'position'   => 0,
                    'status'     => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );

            DB::table('banner_translations')->insert([['banner_id' => $id, 'title' => 'Банер '.$i, 'locale' => 'ru']]);
            DB::table('banner_translations')->insert([['banner_id' => $id, 'title' => 'Банер '.$i, 'locale' => 'ua']]);
            DB::table('banner_translations')->insert([['banner_id' => $id, 'title' => 'Banner '.$i, 'locale' => 'en']]);
            for ($j = 1; $j < 4;){
                $itemId = DB::table('banner_items')->insertGetId(['banner_id' => $id, 'position' => $j, 'status' => 1, 'image' => '/assets/themes/default/img/test.jpg']);
                DB::table('banner_item_translations')->insert([['banner_item_id' => $itemId, 'title' => 'Банер '.$i.' Картинка '.$j,  'locale' => 'ru']]);
                DB::table('banner_item_translations')->insert([['banner_item_id' => $itemId, 'title' => 'Банер '.$i.' Картинка '.$j, 'locale' => 'ua']]);
                DB::table('banner_item_translations')->insert([['banner_item_id' => $itemId, 'title' => 'Banner '.$i.' Image '.$j, 'locale' => 'en']]);
                $j++;
            }
        }

        for ($i = 1; $i < 4; $i++){
            $id = DB::table('photoalbums')->insertGetId(
                [
                    'slug' => 'photoalbum-'.$i,
                    'position'   => 0,
                    'status'     => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );

            DB::table('photoalbum_translations')->insert([['photoalbum_id' => $id, 'title' => 'Фотоальбом '.$i, 'locale' => 'ru']]);
            DB::table('photoalbum_translations')->insert([['photoalbum_id' => $id, 'title' => 'Фотоальбом '.$i, 'locale' => 'ua']]);
            DB::table('photoalbum_translations')->insert([['photoalbum_id' => $id, 'title' => 'Photoalbum '.$i, 'locale' => 'en']]);
            for ($j = 1; $j < 11;){
                $itemId = DB::table('photoalbum_items')->insertGetId(['photoalbum_id' => $id, 'position' => $j, 'status' => 1, 'image' => '/assets/themes/default/img/test.jpg']);
                DB::table('photoalbum_item_translations')->insert([['photoalbum_item_id' => $itemId, 'title' => 'Фотоальбом '.$i.' Картинка '.$j,  'locale' => 'ru']]);
                DB::table('photoalbum_item_translations')->insert([['photoalbum_item_id' => $itemId, 'title' => 'Фотоальбом '.$i.' Картинка '.$j, 'locale' => 'ua']]);
                DB::table('photoalbum_item_translations')->insert([['photoalbum_item_id' => $itemId, 'title' => 'Photoalbum '.$i.' Image '.$j, 'locale' => 'en']]);
                $j++;
            }
        }

        for ($i = 1; $i < 4; $i++){
            $id = DB::table('menus')->insertGetId(
                [
                    'position'   => 0,
                    'status'     => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );

            DB::table('menu_translations')->insert([['menu_id' => $id, 'name' => 'Меню '.$i, 'locale' => 'ru']]);
            DB::table('menu_translations')->insert([['menu_id' => $id, 'name' => 'Меню '.$i, 'locale' => 'ua']]);
            DB::table('menu_translations')->insert([['menu_id' => $id, 'name' => 'Menu '.$i, 'locale' => 'en']]);
            for ($j = 1; $j < 6;){
                $itemId = DB::table('menu_items')->insertGetId(['menu_id' => $id, 'position' => $j, 'status' => 1, 'link' => '/']);
                DB::table('menu_item_translations')->insert([['menu_item_id' => $itemId, 'name' => 'Пункт '.$j.' меню '.$i,  'locale' => 'ru']]);
                DB::table('menu_item_translations')->insert([['menu_item_id' => $itemId, 'name' => 'Пункт '.$j.' меню '.$i, 'locale' => 'ua']]);
                DB::table('menu_item_translations')->insert([['menu_item_id' => $itemId, 'name' => 'Menu '.$i.' item '.$j, 'locale' => 'en']]);
                $j++;
            }
        }

        for ($i = 1; $i < 5; $i++){
            $id = DB::table('text_widgets')->insertGetId(
                [
                    'layout_position' => $i,
                    'position'   => 0,
                    'status'     => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );

            DB::table('text_widget_translations')->insert([['text_widget_id' => $id, 'title' => 'Текстовый виджет '.$i, 'content' => 'Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i.' Текстовый виджет '.$i, 'locale' => 'ru']]);
            DB::table('text_widget_translations')->insert([['text_widget_id' => $id, 'title' => 'Текстовий віджет '.$i, 'content' => 'Текстовий віджет '.$i.' Текстовий віджет '.$i.' Текстовий віджет '.$i.' Текстовий віджет '.$i.' Текстовий віджет '.$i.' Текстовий віджет '.$i.' Текстовий віджет '.$i.' Текстовий віджет '.$i.' Текстовий віджет '.$i, 'locale' => 'ua']]);
            DB::table('text_widget_translations')->insert([['text_widget_id' => $id, 'title' => 'Text widget '.$i, 'content' => 'Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i.' Text widget '.$i, 'locale' => 'en']]);
        }

        for ($i = 1; $i < 5; $i++){
            $id = DB::table('news')->insertGetId(
                [
                    'slug' => 'news-'.$i,
                    'position'   => 0,
                    'status'     => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );

            DB::table('news_translations')->insert([['news_id' => $id, 'title' => 'Новость '.$i, 'content' => 'Новость '.$i.' Новость '.$i.' Новость '.$i.' Новость '.$i.' Новость '.$i.' Новость '.$i.' Новость '.$i.' Новость '.$i.' Новость '.$i.' Новость '.$i, 'locale' => 'ru']]);
            DB::table('news_translations')->insert([['news_id' => $id, 'title' => 'Новина '.$i, 'content' => 'Новина '.$i.' Новина '.$i.' Новина '.$i.' Новина '.$i.' Новина '.$i.' Новина '.$i.' Новина '.$i.' Новина '.$i.' Новина '.$i, 'locale' => 'ua']]);
            DB::table('news_translations')->insert([['news_id' => $id, 'title' => 'News '.$i, 'content' => 'News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i.' News '.$i, 'locale' => 'en']]);
        }
    }
}
