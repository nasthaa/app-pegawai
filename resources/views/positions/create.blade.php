<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Pegawai</title>
    </head>
    <body>
        <h1 class="mb-4">Form Pegawai</h1>
        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="nama_jabatan">Nama Jabatan:</label></td>
                    <td><input type="text" id="nama_jabatan" name="nama_jabatan"></td>
                </tr>
                <tr>
                    <td><label for="gaji_pokok">Gaji pokok:</label></td>
                    <td><input type="number" id="gaji_pokok" name="gaji_pokok"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;">
                        <button type="submit">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>