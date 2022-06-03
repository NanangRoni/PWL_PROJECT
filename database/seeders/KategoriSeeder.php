<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category = [
           [
               'name'   => 'Cuci Kering'
           ],
           [
               'name'   => 'Cuci Kering + Setrika'
           ],
           [
               'name'   => 'Cuci Basah'
           ],
        ];

        Kategori::insert($category);
    }
}
