<?php

class TopicTableSeeder extends Seeder {
 
  public function run()
  {

	$faker = Faker\Factory::create();
 
	for ($i = 0; $i < 50; $i++)
	{
	  $new = Topic::create(array(
		  'author' => $faker->name,
		  'title' => $faker->sentence(10),
		  'message' => $faker->paragraphs(2,true),
		  'updated_at' => $faker->dateTime('now'),
		  'created_at' => $faker->dateTime('now'),
	  ));
	}
  }
 
}