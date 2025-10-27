<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Pegawai</title>
    </head>
    <body>
        <h1 class="mb-4">Form Pegawai</h1>
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="karyawan_id">Karyawan:</label></td>
                    <td>
                        <select name="karyawan_id" id="karyawan_id">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }} ({{ $employee->position->nama_jabatan ?? 'Tidak ada posisi' }})</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="bulan">Bulan:</label></td>
                    <td><input type="text" id="bulan" name="bulan"></td>
                </tr>
                <tr>
                    <td><label for="gaji_pokok">Gaji pokok:</label></td>
                    <td><input type="number" id="gaji_pokok" name="gaji_pokok" step="0.01" readonly></td>
                </tr>
                <tr>
                    <td><label for="tunjangan">Tunjangan:</label></td>
                    <td><input type="text" id="tunjangan" name="tunjangan"></td>
                </tr>
                <tr>
                    <td><label for="potongan">Potongan:</label></td>
                    <td><input type="text" id="potongan" name="potongan"></td>
                </tr>
                <tr>
                    <td><label for="total_gaji">Total Gaji:</label></td>
                    <td><input type="number" id="total_gaji" name="total_gaji" step="0.01" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;">
                        <button type="submit">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const gajiInput = document.getElementById('gaji_pokok');
        const tunjanganInput = document.getElementById('tunjangan');
        const potonganInput = document.getElementById('potongan');
        const totalInput = document.getElementById('total_gaji');

        // Saat nama karyawan diubah
        $('#karyawan_id').on('change', function () {
            const id = $(this).val();

            if (id) {
                $.ajax({
                    url: `/get-salary/${id}`,
                    type: 'GET',
                    success: function (data) {
                        $('#gaji_pokok').val(data.gaji_pokok ?? 0);
                        updateTotal();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#gaji_pokok').val(0);
                updateTotal();
            }
        });

        // Update total otomatis
        [tunjanganInput, potonganInput].forEach(input => {
            input.addEventListener('input', updateTotal);
        });

        function updateTotal() {
            const gaji = parseFloat(gajiInput.value) || 0;
            const tunjangan = parseFloat(tunjanganInput.value) || 0;
            const potongan = parseFloat(potonganInput.value) || 0;
            totalInput.value = gaji + tunjangan - potongan;
        }
    </script>
</html>