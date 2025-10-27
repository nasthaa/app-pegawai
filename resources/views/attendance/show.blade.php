<!DOCTYPE html>
<html>
    <head>
        <title>Detail Pegawai</title>
    </head>
    <body>
        <h1>Detail Pegawai</h1>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $attendance->employee?->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $attendance->tanggal }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td>{{ $attendance->waktu_masuk }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $attendance->waktu_keluar }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $attendance->status }}</td>
            </tr>
        </table>
    </body>
</html>