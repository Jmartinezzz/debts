<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function change(Request $request) {
        $workspace_id = $request->workspace_id;
        auth()->user()->update(
            [
                'active_workspace' => $workspace_id
            ]
        );

        return redirect()->route('home');

    }
}
