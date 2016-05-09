<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$users=[

			['email'=>'atef@hotmail.com','password'=>'atefatef','name'=>'Bouhlel','firstname'=>'Atef','tel'=>'07 89 65 31 73','adress'=>'Cathedrale','city'=>'Sousse','birthdate'=>'1990-05-12','gender'=>'Homme','promo'=>'2018','url_photo'=>'/images/atef.jpg','isAdmin'=>'0','created_at'=>'1990-05-12','updated_at'=>'1990-05-12'],
			
		];
		DB::table('user')->insert($users);

		// $this->call('UserTableSeeder');
	}

}
