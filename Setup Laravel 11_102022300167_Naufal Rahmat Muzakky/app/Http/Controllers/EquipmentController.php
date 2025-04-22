<?php

namespace App\Http\Controllers;

use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::all();
        return view('index', compact('equipment'));
    }
}
