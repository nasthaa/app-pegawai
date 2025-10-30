<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller {
    public function index() {
        $positions = Position::query()
            ->orderBy('nama_jabatan', 'asc')
            ->paginate(5);
        
        return view('positions.index', compact('positions'));
    }

    public function create() {
        
        return view('positions.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok'   => 'required|numeric',
        ]);

        Position::create($request->all());
        
        return redirect()->route('positions.index')->with('success','Position created successfully');
    }

    public function show(string $id) {
        $position = Position::find($id);
        
        return view('positions.show', compact('position'));
    }

    public function edit(string $id) {
        $position = Position::find($id);
        
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->all());
        
        return redirect()->route('positions.index')->with('success','Position updated successfully!');
    }

    public function destroy(string $id) {
        $position = Position::findOrFail($id);
        $position->delete();
        
        return redirect()->route('positions.index')->with('success','Position delete suceessfully.');
    }
}