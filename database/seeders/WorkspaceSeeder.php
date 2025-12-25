<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Workspace;
use App\Models\UserWorkspace;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserWorkspace::insert([
            [
                'user_id' => 1,
                'workspace_id' => 1,
                'role' => 'invited',
            ],
            [
                'user_id' => 1,
                'workspace_id' => 2,
                'role' => 'admin',
            ],
        ]);
    }
}
