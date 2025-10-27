<!DOCTYPE html>
<html>
    <head>
        <title>Detail Pegawai</title>
    </head>
    <body>
        <h1>Detail Pegawai</h1>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Nama Karyawan</th>
                <td>{{ $salary->employee?->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Bulan</th>
                <td>{{ $salary->bulan }}</td>
            </tr>
            <tr>
                <th>Gaji Pokok</th>
                <td>{{ $salary->gaji_pokok }}</td>
            </tr>
            <tr>
                <th>Tunjangan</th>
                <td>{{ $salary->tunjangan }}</td>
            </tr>
            <tr>
                <th>Potongan</th>
                <td>{{ $salary->potongan }}</td>
            </tr>
            <tr>
                <th>Total gaji</th>
                <td>{{ $salary->total_gaji }}</td>
            </tr>
        </table>
    </body>
</html>