<?php

namespace App\Http\Controllers;

use App\Models\Train;

class TrainController extends Controller
{
    public function index()
    {
        $trains = Train::fromToday()
            ->orderBy('departure_date')
            ->orderBy('departure_time')
            ->get();

        return view('index', compact('trains'));
    }
}
