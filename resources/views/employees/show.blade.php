@extends('master')

@section('title', 'Employee')
@section('active-employee', 'active')
@section('sub-title', 'Detail Employee')
@section('caption', 'Page')

@section('content')
<form class="mt-4">
    <div class="mb-3 row">
        <label for="nama_lengkap" class="col-sm-2 col-form-label fs-4">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $employee->nama_lengkap }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label fs-4">Email</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" value="{{ $employee->email }}" readonly>
        </div>
        <label for="nomor_telepon" class="col-sm-2 col-form-label fs-4">Phone</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $employee->nomor_telepon }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label fs-4">Tanggal Lahir</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" value="{{ $employee->tanggal_lahir }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label fs-4">Address</label>
        <div class="col-sm-10">
            <textarea class="form-control" readonly>{{ $employee->alamat }}</textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_masuk" class="col-sm-2 col-form-label fs-4">Start Date</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" value="{{ $employee->tanggal_masuk }}" readonly>
        </div>
        <label for="status" class="col-sm-2 col-form-label fs-4">Status</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $employee->status }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="department" class="col-sm-2 col-form-label fs-4">Department</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $employee->department->nama_departemen }}" readonly>
        </div>
        <label for="positions" class="col-sm-2 col-form-label fs-4">Position</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $employee->position->nama_jabatan }}" readonly>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/employees'">Back</button>
    </div>
</form>
@endsection