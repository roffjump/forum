<?php

class TopicAnswerTableSeeder extends Seeder {
 
  public function run()
  {

	$faker = Faker\Factory::create();
 
	for ($i = 0; $i < 200; $i++)
	{
	  $new = TopicAnswer::create(array(
		  'tid' => $faker->randomDigitNotNull,
		  'author' => $faker->name,
		  'title' => $faker->sentence(10),
		  'message' => $faker->paragraphs(5,true),
		  'place' => $faker->randomElement(array('web','api')),
		  'updated_at' => $faker->dateTime('now'),
		  'created_at' => $faker->dateTime('now'),
	  ));
	}
  }
 
}