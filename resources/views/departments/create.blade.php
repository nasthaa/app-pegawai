@extends('master')

@section('title', 'Department')
@section('active-department', 'active')
@section('sub-title', 'Create Department')
@section('caption', 'Page')

@section('content')
<form action="{{ route('departments.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3 row">
        <label for="nama_departemen" class="col-sm-2 col-form-label fs-4">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" required>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/departments'">Back</button>
        <button type="submit" class="btn btn-info me-2">Save</button>
    </div>
</form>
@endsection