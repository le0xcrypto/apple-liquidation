<?php

namespace App\Http\Controllers;

use App\Models\User;

class Liquidation extends Controller
{
    public function show()
    {
        return inertia('Liquidation/Show', [
            'positions' => [
                ['borrowed' => 1000, 'health' => 1.1, 'address' => '0x1111111111111111111111111111111111111111'],
                ['borrowed' => 2000, 'health' => 1.2, 'address' => '0x2222222222222222222222222222222222222222']
            ],
        ]);
    }
}
