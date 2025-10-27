<!DOCTYPE html>
<html>
    <head>
        <title>Detail Pegawai</title>
    </head>
    <body>
        <h1>Detail Pegawai</h1>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Nama Jabatan</th>
                <td>{{ $position->nama_jabatan }}</td>
            </tr>
            <tr>
                <th>Gaji Pokok</th>
                <td>{{ $position->gaji_pokok }}</td>
            </tr>
        </table>
    </body>
</html>