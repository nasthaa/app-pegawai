@extends('master')

@section('title', 'Attendance')
@section('active-attendance', 'active')
@section('sub-title', 'Update Attendance')
@section('caption', 'Page')

@section('content')
<form action="{{ route('attendance.update', $attendance->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3 row">
        <label for="karyawan_id" class="col-sm-2 col-form-label fs-4">Employee</label>
        <div class="col-sm-10">
            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                <option value="" disabled>- Select Employee -</option>
                @foreach ($employees as $employee)
                    <option 
                        value="{{ $employee->id }}" 
                        {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label fs-4">Tanggal</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal" name="tanggal" 
                value="{{ old('tanggal', $attendance->tanggal) }}" required>
        </div>

        <label for="status" class="col-sm-2 col-form-label fs-4">Status</label>
        <div class="col-sm-4">
            <select class="form-control" id="status" name="status" required>
                <option value="" disabled>- Select Status -</option>
                <option value="Hadir" {{ old('status', $attendance->status) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Izin" {{ old('status', $attendance->status) == 'Izin' ? 'selected' : '' }}>Izin</option>
                <option value="Sakit" {{ old('status', $attendance->status) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="Alpha" {{ old('status', $attendance->status) == 'Alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="waktu_masuk" class="col-sm-2 col-form-label fs-4">Waktu Masuk</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk" step="1" 
                value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" required>
        </div>

        <label for="waktu_keluar" class="col-sm-2 col-form-label fs-4">Waktu Keluar</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" id="waktu_keluar" name="waktu_keluar" step="1" 
                value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
        </div>
    </div>

    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/attendance'">Back</button>
        <button type="submit" class="btn btn-info me-2">Save</button>
    </div>
</form>
@endsection