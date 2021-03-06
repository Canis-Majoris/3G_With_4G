<?php
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		foreach (range(1, 200) as $index) {
			$name = $faker->username;
			$typeNum = $faker->numberBetween(0,3);
			$company = -1;
			if ($typeNum == 2||$typeNum == 3) {
				$company = $faker->company();
			}
			User::create([
				'email' => $faker->email,
				'active' => 1,
				'username' => $name,
				'password' => Hash::make($name),
				'firstname' => $faker->firstname(),
				'lastname' =>$faker->lastname(),
				'gender' => $faker->numberBetween(0,1),
				'type' => $typeNum,
				'status' => 1,
				'company_name' => $company,
				'description' => $faker->text

			]);
		}

		// $this->call('UserTableSeeder');
	}

}
