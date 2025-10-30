@extends('master')

@section('title', 'Salary')
@section('active-salary', 'active')
@section('sub-title', 'Update Salary')
@section('caption', 'Page')

@section('content')
<form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="mt-4">
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
                        {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }} ({{ $employee->position->nama_jabatan ?? 'No Position' }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="bulan" class="col-sm-2 col-form-label fs-4">Month</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="bulan" name="bulan" 
                value="{{ old('bulan', $salary->bulan) }}" required>
        </div>
        <label for="gaji_pokok" class="col-sm-2 col-form-label fs-4">Basic Salary</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="gaji_pokok_display" readonly
                value="{{ number_format($salary->gaji_pokok, 0, '', '.') . ',00' }}">
            <input type="hidden" id="gaji_pokok" name="gaji_pokok" 
                value="{{ old('gaji_pokok', $salary->gaji_pokok) }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tunjangan" class="col-sm-2 col-form-label fs-4">Allowance</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="tunjangan_display" 
                value="{{ number_format($salary->tunjangan, 0, '', '.') . ',00' }}">
            <input type="hidden" id="tunjangan" name="tunjangan" 
                value="{{ old('tunjangan', $salary->tunjangan) }}">
        </div>
        <label for="potongan" class="col-sm-2 col-form-label fs-4">Deduction</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="potongan_display" 
                value="{{ number_format($salary->potongan, 0, '', '.') . ',00' }}">
            <input type="hidden" id="potongan" name="potongan" 
                value="{{ old('potongan', $salary->potongan) }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="total_gaji" class="col-sm-2 col-form-label fs-4">Total Salary</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="total_gaji_display" readonly
                value="{{ number_format($salary->total_gaji, 0, '', '.') . ',00' }}">
            <input type="hidden" id="total_gaji" name="total_gaji" 
                value="{{ old('total_gaji', $salary->total_gaji) }}">
        </div>
    </div>
    <div class="pt-3">
        <button type="button" class="btn btn-danger me-2" onclick="window.location.href='/salaries'">Back</button>
        <button type="submit" class="btn btn-info me-2">Save</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const formatRibuan = (angka) => angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    function setupFormat(displayId, hiddenId, callback) {
        const display = document.getElementById(displayId);
        const hidden = document.getElementById(hiddenId);
        display.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            hidden.value = value;
            this.value = value ? formatRibuan(value) : '';
            if (callback) callback();
        });
        display.addEventListener('blur', function() {
            if (this.value && !this.value.includes(',')) {
                this.value += ',00';
            }
        });
        display.addEventListener('focus', function() {
            this.value = this.value.replace(',00', '');
        });
    }

    setupFormat('tunjangan_display', 'tunjangan', updateTotal);
    setupFormat('potongan_display', 'potongan', updateTotal);

    $('#karyawan_id').on('change', function () {
        const id = $(this).val();
        if (id) {
            $.ajax({
                url: `/get-salary/${id}`,
                type: 'GET',
                success: function (data) {
                    const gaji = data.gaji_pokok ?? 0;
                    $('#gaji_pokok').val(gaji);
                    $('#gaji_pokok_display').val(formatRibuan(gaji.toString()) + ',00');
                    updateTotal();
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    function updateTotal() {
        const gaji = parseFloat($('#gaji_pokok').val()) || 0;
        const tunjangan = parseFloat($('#tunjangan').val()) || 0;
        const potongan = parseFloat($('#potongan').val()) || 0;
        const total = gaji + tunjangan - potongan;
        $('#total_gaji').val(total);
        $('#total_gaji_display').val(formatRibuan(total.toString()) + ',00');
    }
</script>
@endsection