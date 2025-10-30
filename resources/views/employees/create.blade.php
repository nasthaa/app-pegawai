@extends('master')

@section('title', 'Employee')
@section('active-employee', 'active')
@section('sub-title', 'Create Employee')
@section('caption', 'Page')

@section('content')
<form action="{{ route('employees.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3 row">
        <label for="nama_lengkap" class="col-sm-2 col-form-label fs-4">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label fs-4">Email</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <label for="nomor_telepon" class="col-sm-2 col-form-label fs-4">Phone</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label fs-4">Tanggal Lahir</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label fs-4">Address</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_masuk" class="col-sm-2 col-form-label fs-4">Start Date</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
        </div>
        <label for="status" class="col-sm-2 col-form-label fs-4">Status</label>
        <div class="col-sm-4">
            <select class="form-control" id="status" name="status" required>
                <option value="" disabled selected>- Select Status -</option>
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="department" class="col-sm-2 col-form-label fs-4">Department</label>
        <div class="col-sm-4">
            <select class="form-control" id="department_id" name="department_id" required>
                <option value="" disabled selected>- Select Department -</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->nama_departemen }}</option>
                @endforeach
            </select>
        </div>
        <label for="positions" class="col-sm-2 col-form-label fs-4">Position</label>
        <div class="col-sm-4">
            <select class="form-control" id="jabatan_id" name="jabatan_id" required>
                <option value="" disabled selected>- Select Position -</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/employees'">Back</button>
        <button type="submit" class="btn btn-info me-2">Save</button>
    </div>
</form>
@endsection