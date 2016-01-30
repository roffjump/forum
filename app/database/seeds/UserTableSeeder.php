<?php

class UserTableSeeder extends Seeder {
 
  public function run()
  {

    // $table->string('email')->unique();
    // $table->string('name');
    // $table->string('username');
    // $table->text('password');
	$user = User::create(array(
	  'email' => 'roffjump@gmail.com',
	  'name' => 'roffjump',
	  'username' => 'roffjump',
	  'password' =>  Hash::make('roffjump2016##'),
	)); 

	$faker = Faker\Factory::create();
 
	for ($i = 0; $i < 10; $i++)
	{
	  $user = User::create(array(
		  'email' => $faker->email,
		  'name' => $faker->name,
		  'username' => $faker->username,
		  'password' =>  Hash::make($faker->word),
	  ));
	}
  }
 
}