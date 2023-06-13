<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CatagorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Catagory::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            "Komik dan Novel", "Literasi", "Bahasa Indonesia dan Asing", "Sains dan Teknologi"
        ];
        foreach ($data as $hasil) {
            Catagory::insert([
                "name" => $hasil
            ]);
        }
    }
}
