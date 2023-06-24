<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoryTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            "nom_category" => "Electromanager"
        ]);

        DB::table('categories')->insert([
            "nom_category" => "Electronics"
        ]);

        DB::table('categories')->insert([
            "nom_category" => "Fashion"
        ]);

        DB::table('categories')->insert([
            "nom_category" => "Home"
        ]);

        DB::table('categories')->insert([
            "nom_category" => "Books"
        ]);

        DB::table('categories')->insert([
            "nom_category" => "Sports"
        ]);
    }
}
