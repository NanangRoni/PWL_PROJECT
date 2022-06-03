<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusSales;

class StatusSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusSales::create([
           'name'   => 'Kilogram',
           'satuan' => 'Kg'
       ]);
    }
}
