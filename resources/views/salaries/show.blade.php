@extends('master')

@section('title', 'Salary')
@section('active-salary', 'active')
@section('sub-title', 'Detail Salary')
@section('caption', 'Page')

@section('content')
<form class="mt-4">
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label fs-4">Employee Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" 
                value="{{ $salary->employee?->nama_lengkap ?? '-' }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label fs-4">Month</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ $salary->bulan }}" readonly>
        </div>
        <label class="col-sm-2 col-form-label fs-4">Basic Salary</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ number_format($salary->gaji_pokok, 0, '', '.') . ',00' }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label fs-4">Allowance</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ number_format($salary->tunjangan, 0, '', '.') . ',00' }}" readonly>
        </div>
        <label class="col-sm-2 col-form-label fs-4">Deduction</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ number_format($salary->potongan, 0, '', '.') . ',00' }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label fs-4">Total Salary</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"
                value="{{ number_format($salary->total_gaji, 0, '', '.') . ',00' }}" readonly>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" 
            onclick="window.location.href='/salaries'">Back</button>
    </div>
</form>
@endsection