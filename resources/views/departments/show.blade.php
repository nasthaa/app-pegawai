@extends('master')

@section('title', 'Department')
@section('active-department', 'active')
@section('sub-title', 'Department Detail')
@section('caption', 'Page')

@section('content')
<form class="mt-4">
    <div class="mb-3 row">
        <label for="nama_departemen" class="col-sm-2 col-form-label fs-4">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $department->nama_departemen }}" readonly>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/departments'">Back</button>
    </div>
</form>
@endsection