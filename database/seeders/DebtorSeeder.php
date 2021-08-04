<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Debtor;


class DebtorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Debtor::factory(10)->create();
    }
}
