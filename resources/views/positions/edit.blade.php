@extends('master')

@section('title', 'Position')
@section('active-position', 'active')
@section('sub-title', 'Update Position')
@section('caption', 'Page')

@section('content')
<form action="{{ route('positions.update', $position->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')
    
    <div class="mb-3 row">
        <label for="nama_jabatan" class="col-sm-2 col-form-label fs-4">Position Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required>
        </div>
        <label for="gaji_pokok" class="col-sm-2 col-form-label fs-4">Base Salary</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="gaji_pokok_display" required>
            <input type="hidden" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}" required>
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/positions'">Back</button>
        <button type="submit" class="btn btn-info me-2">Save</button>
    </div>
</form>

<script>
    const displayInput = document.getElementById('gaji_pokok_display');
    const hiddenInput = document.getElementById('gaji_pokok');

    function formatRibuan(angka) {
        return angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    window.addEventListener('DOMContentLoaded', function () {
        let initialValue = hiddenInput.value || '0';
        displayInput.value = formatRibuan(initialValue) + ',00';
    });

    displayInput.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        hiddenInput.value = value;
        this.value = value ? formatRibuan(value) : '';
    });

    displayInput.addEventListener('blur', function () {
        if (this.value && !this.value.includes(',')) {
            this.value = this.value + ',00';
        }
    });

    displayInput.addEventListener('focus', function () {
        this.value = this.value.replace(',00', '');
    });
</script>
@endsection