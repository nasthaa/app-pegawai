@extends('master')

@section('title', 'Attendance')
@section('active-attendance', 'active')
@section('sub-title', 'Create Attendance')
@section('caption', 'Page')

@section('content')
<form action="{{ route('attendance.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3 row">
        <label for="karyawan_id" class="col-sm-2 col-form-label fs-4">Employee</label>
        <div class="col-sm-10">
            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                <option value="" disabled selected>- Select Employee -</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label fs-4">Date</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="waktu_masuk" class="col-sm-2 col-form-label fs-4">Check In</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk" step="1" required>
        </div>
        <label for="waktu_keluar" class="col-sm-2 col-form-label fs-4">Check Out</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" id="waktu_keluar" name="waktu_keluar" step="1" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="status" class="col-sm-2 col-form-label fs-4">Status</label>
        <div class="col-sm-10">
            <select class="form-control" id="status" name="status" required>
                <option value="" disabled selected>- Select Status -</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
            </select>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/attendance'">Back</button>
        <button type="submit" class="btn btn-info me-2">Save</button>
    </div>
</form>
@endsection