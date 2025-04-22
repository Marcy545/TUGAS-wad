<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    public function __construct()
    {
        // Check authentication on all controller methods
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                return redirect()->route('login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $equipment = Equipment::all();
        return view('equipment.index', compact('equipment'));
    }
    
    public function create()
    {
        return view('equipment.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'brand' => 'required',
            'quantity' => 'required|integer|min:0',
            'rental_price' => 'required|numeric|min:0',
        ]);
        
        Equipment::create($request->all());
        
        return redirect()->route('equipment.index')
            ->with('success', 'Equipment added successfully');
    }
}