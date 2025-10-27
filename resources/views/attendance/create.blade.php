<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Pegawai</title>
    </head>
    <body>
        <h1 class="mb-4">Form Pegawai</h1>
        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="karyawan_id">Karyawan:</label></td>
                    <td>
                        <select name="karyawan_id">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="tanggal">Tanggal:</label></td>
                    <td><input type="date" id="tanggal" name="tanggal"></td>
                </tr>
                <tr>
                    <td><label for="waktu_masuk">Waktu masuk:</label></td>
                    <td><input type="time" id="waktu_masuk" name="waktu_masuk" step="1"></td>
                </tr>
                <tr>
                    <td><label for="waktu_keluar">Waktu keluar:</label></td>
                    <td><input type="time" id="waktu_keluar" name="waktu_keluar" step="1"></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select id="status" name="status">
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Alpha">Alpha</option>
                        </select>
                    </td>
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