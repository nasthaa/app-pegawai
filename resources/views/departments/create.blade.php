<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Pegawai</title>
    </head>
    <body>
        <h1 class="mb-4">Form Pegawai</h1>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="nama_departemen">Nama Departemen:</label></td>
                    <td><input type="text" id="nama_departemen" name="nama_departemen"></td>
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