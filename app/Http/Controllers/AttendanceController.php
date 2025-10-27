<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller {
    public function index() {
        $attendance = Attendance::latest()->paginate(10);
        
        return view('attendance.index', compact('attendance'));
    }

    public function create() {
        $employees = Employee::all();
        
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request) {
        $request->validate([
            'karyawan_id'  => 'required|exists:employees,id',
            'tanggal'      => 'required|date',
            'waktu_masuk'  => 'nullable|date_format:H:i:s',
            'waktu_keluar' => 'nullable|date_format:H:i:s',
            'status'       => 'required|in:Hadir,Sakit,Izin,Alpha',
        ]);

        $data = $request->all();

        if(!empty($data['waktu_masuk'])) {
            $data['waktu_masuk'] = strlen($data['waktu_masuk']) == 5 ? $data['waktu_masuk'] . ':00' : $data['waktu_masuk'];
        }

        if(!empty($data['waktu_keluar'])) {
            $data['waktu_keluar'] = strlen($data['waktu_keluar']) == 5 ? $data['waktu_keluar'] . ':00' : $data['waktu_keluar'];
        }

        Attendance::create($request->all());
        
        return redirect()->route('attendance.index')->with('success', 'Attendance record created successfully!');
    }

    public function show($id) {
        $attendance = Attendance::find($id);
        
        return view('attendance.show', compact('attendance'));
    }

    public function edit($id) {
        $attendance = Attendance::find($id);
        $employees  = Employee::all();
        
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s',
            'waktu_keluar' => 'nullable|date_format:H:i:s',
            'status' => 'required|in:Hadir,Sakit,Izin,Alpha',
        ]);

        $data = $request->all();

        if(!empty($data['waktu_masuk'])) {
            $data['waktu_masuk'] = strlen($data['waktu_masuk']) == 5 ? $data['waktu_masuk'] . ':00' : $data['waktu_masuk'];
        }

        if(!empty($data['waktu_keluar'])) {
            $data['waktu_keluar'] = strlen($data['waktu_keluar']) == 5 ? $data['waktu_keluar'] . ':00' : $data['waktu_keluar'];
        }

        $attendance = Attendance::findOrFail($id);
        $attendance->update($data);
        
        return redirect()->route('attendance.index')->with('success', 'Attendance record updated successfully!');
    }

    public function destroy($id) {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        
        return redirect()->route('attendance.index')->with('success', 'Attendance record deleted successfully!');
    }
}