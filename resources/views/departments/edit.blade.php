<!DOCTYPE html>
    <head>
        <title>Form Edit Pegawai</title>
    </head>
    <body>
        <h2>Edit Data Pegawai</h2>
            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table>
                    <tr>
                        <td>Nama Departemen</td>
                        <td><input type="text" name="nama_departemen" value="{{ old('nama_departemen', $department->nama_departemen) }}"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
    </body>
</html>