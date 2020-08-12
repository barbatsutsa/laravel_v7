<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];

        for($i=0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(3, 10)),
                'slug'  => $faker->slug(mt_rand(3, 10)),
                'description' => $faker->realText(mt_rand(100, 200))
            ];
        }

        return $data;
    }
}
