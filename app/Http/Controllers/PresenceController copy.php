<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::all();
        return view('presences.index', compact('presences'));
    }
    
    public function create()
    {
        return view('presences.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
            'date' => 'required|date',
        ]);
        
        Presence::create($request->all());
        
        return redirect()->route('presences.index')->with('success', 'Presence created successfully.');
    }
    
    public function show(Presence $presence)
    {
        return view('presences.show', compact('presence'));
    }
    
    public function edit(Presence $presence)
    {
        return view('presences.edit', compact('presence'));
    }
    
    public function update(Request $request, Presence $presence)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
            'date' => 'required|date',
        ]);
        
        $presence->update($request->all());
        
        return redirect()->route('presences.index')->with('success', 'Presence updated successfully.');
    }
    
    public function destroy(Presence $presence)
    {
        $presence->delete();
        
        return redirect()->route('presences.index')->with('success', 'Presence deleted successfully.');
    }
}

