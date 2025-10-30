@extends('master')

@section('title', 'Position')
@section('active-position', 'active')
@section('sub-title', 'Position Detail')
@section('caption', 'Page')

@section('content')
<form class="mt-4">
    <div class="mb-3 row">
        <label for="nama_jabatan" class="col-sm-2 col-form-label fs-4">Position Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="{{ $position->nama_jabatan }}" readonly>
        </div>
        <label for="gaji_pokok" class="col-sm-2 col-form-label fs-4">Base Salary</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="gaji_pokok_display" readonly>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/positions'">Back</button>
    </div>
</form>

<script>
    const displayInput = document.getElementById('gaji_pokok_display');
    const rawValue = "{{ $position->gaji_pokok }}";

    function formatGaji(angka) {
        const num = parseInt(angka, 10) || 0;
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ",00";
    }

    displayInput.value = formatGaji(rawValue);
</script>
@endsection