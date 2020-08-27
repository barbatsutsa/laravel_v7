<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedback')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];

        for($i=0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->sentence(mt_rand(1, 1)),
                'review' => $faker->realText(mt_rand(100, 200))
            ];
        }

        return $data;
    }
}
