<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Debt;

class DebtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Debt::factory(10)->create();            
    }
}
