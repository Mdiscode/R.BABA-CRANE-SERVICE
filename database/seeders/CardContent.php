<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class CardContent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('card_contents')->insert([
          [
            "title"=>"Crane services",
          "description"=>"this is provide the good services and fast services",
          "location"=>"Bhilad vapi",
          "address"=>"near gareeb nawaz hotel",
          "image"=>"20X40",
          "phoneNo"=>"994450"
          ],
          "title"=>"Crane services1",
          "description"=>"this1 is provide the good services and fast services",
          "location"=>"Bhilad1 vapi",
          "address"=>"near1 gareeb nawaz hotel",
          "image"=>"20X40",
          "phoneNo"=>"99334450"
        ]);
    }
}
