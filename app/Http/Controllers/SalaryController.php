<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller {
    public function index() {
        $salaries = Salary::latest()->paginate(10);
        
        return view('salaries.index', compact('salaries'));
    }

    public function getSalary($id) {
        $employee = Employee::with('position')->find($id);
        
        if ($employee && $employee->position) {
            return response()->json(['gaji_pokok' => $employee->position->gaji_pokok]);
        }
        
        return response()->json(['gaji_pokok' => 0]);
    }

    public function create() {
        $employees = Employee::with('position')->get();
        
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request) {
        $request->validate([
            'karyawan_id'  => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10',
            'gaji_pokok'  => 'nullable|numeric',
            'tunjangan'   => 'nullable|numeric',
            'potongan'    => 'nullable|numeric',
            'total_gaji'  => 'required|numeric',
        ]);

        $employee   = Employee::with('position')->findOrFail($request->karyawan_id);
        $gaji_pokok = $employee->position->gaji_pokok ?? 0;
        $tunjangan  = $request->tunjangan ?? 0;
        $potongan   = $request->potongan ?? 0;
        $total_gaji = $gaji_pokok + $tunjangan - $potongan;

        Salary::create([
            'karyawan_id' => $employee->id,
            'bulan'       => $request->bulan,
            'gaji_pokok'  => $gaji_pokok,
            'tunjangan'   => $tunjangan,
            'potongan'    => $potongan,
            'total_gaji'  => $total_gaji,
        ]);
        
        return redirect()->route('salaries.index')->with('success', 'Salary record created successfully.');
    }

    public function show(string $id) {
        $salary = Salary::find($id);
        
        return view('salaries.show', compact('salary'));
    }

    public function edit(string $id) {
        $salary    = Salary::find($id);
        $employees = Employee::with('position')->get();
        
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'karyawan_id'=> 'required|exists:employees,id',
            'bulan'      => 'required|string|max:10',
            'gaji_pokok' => 'nullable|numeric',
            'tunjangan'  => 'nullable|numeric',
            'potongan'   => 'nullable|numeric',
            'total_gaji' => 'required|numeric',
        ]);

        $salary = Salary::findOrFail($id);
        $salary->update($request->all());
        
        return redirect()->route('salaries.index')->with('success', 'Salary record updated successfully.');
    }

    public function destroy(string $id) {
        $salary = Salary::findOrFail($id);
        $salary->delete();
        
        return redirect()->route('salaries.index')->with('success', 'Salary record deleted successfully.');
    }
}