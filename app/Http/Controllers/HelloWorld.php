<?php

namespace App\Http\Controllers;

use App\Models\User;

class HelloWorld extends Controller
{
    public function show()
    {
        $user = User::first();

        // Alternatively, you can use the inertia() helper
        return inertia('Event/Show', [
            'user' => $user->only('name'),
        ]);
    }
}
