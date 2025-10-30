<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller {
    public function index() {
        $departments = Department::query()
            ->orderBy('nama_departemen', 'asc')
            ->paginate(5);
        
        return view('departments.index', compact('departments'));
    }

    public function create() {
        
        return view('departments.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        Department::create($request->all());
        
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function show(string $id) {
        $department = Department::find($id);
        
        return view('departments.show', compact('department'));
    }

    public function edit(string $id) {
        $department = Department::find($id);
        
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());
        
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(string $id) {
        $department = Department::findOrFail($id);
        $department->delete();
        
        return redirect()->route('departments.index')->with('success','Department delete suceessfully.');
    }
}