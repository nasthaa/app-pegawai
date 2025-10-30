@extends('master')

@section('title', 'Attendance')
@section('active-attendance', 'active')
@section('sub-title', 'Detail Attendance')
@section('caption', 'Page')

@section('content')
<form class="mt-4">
    <div class="mb-3 row">
        <label for="nama_lengkap" class="col-sm-2 col-form-label fs-4">Nama Pegawai</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"
                value="{{ $attendance->employee?->nama_lengkap ?? '-' }}" readonly>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label fs-4">Tanggal</label>
        <div class="col-sm-4">
            <input type="date" class="form-control"
                value="{{ $attendance->tanggal }}" readonly>
        </div>

        <label for="status" class="col-sm-2 col-form-label fs-4">Status</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ $attendance->status }}" readonly>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="waktu_masuk" class="col-sm-2 col-form-label fs-4">Waktu Masuk</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ $attendance->waktu_masuk }}" readonly>
        </div>

        <label for="waktu_keluar" class="col-sm-2 col-form-label fs-4">Waktu Keluar</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ $attendance->waktu_keluar ?? '-' }}" readonly>
        </div>
    </div>

    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2"
            onclick="window.location.href='/attendance'">Back</button>
    </div>
</form>
@endsection