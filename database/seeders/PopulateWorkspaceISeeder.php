<?php

namespace Database\Seeders;

use App\Models\Debtor;
use Illuminate\Database\Seeder;

class PopulateWorkspaceISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // este seeder se ha creado para llenar de datos el campo workspace id de la tabla de debtors
        // con un id 1 ya que es el primer workspace que existio en el sistema
        $debtors = Debtor::query();
        $debtors->update(['workspace_id' => 1]);
    }
}
