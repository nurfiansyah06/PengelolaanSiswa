<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 10; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('siswa')->insert([
    			'nama_depan' => $faker->name,
    			'nama_belakang' => $faker->name,
    			'jenis_kelamin' => $faker->randomElement($array = array('L', 'P')),
    			'agama' => $faker->randomElement($array = array('Islam', 'Kristen','Hindu','Buddha')),
    			'alamat' => $faker->address
    		]);
 
    	}
    }
}
