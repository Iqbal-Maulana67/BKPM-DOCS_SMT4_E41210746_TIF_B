<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //
        DB::table('detail_profile')->insert(['address' => 'Jember', 'nomor-tlp' => '083833833', 'ttl' => '2000-11-1', 'foto' => 'profile.png']);
    }
}
