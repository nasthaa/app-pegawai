<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Pegawai</title>
    </head>
    <body>
        <h1 class="mb-4">Form Pegawai</h1>
        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td><label for="karyawan_id">Karyawan:</label></td>
                    <td>
                        <select name="karyawan_id">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $attendance->karyawan_id == $employee->id ? 'selected' : '' }}>{{ $employee->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="tanggal">Tanggal:</label></td>
                    <td><input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}"></td>
                </tr>
                <tr>
                    <td><label for="waktu_masuk">Waktu masuk:</label></td>
                    <td><input type="time" id="waktu_masuk" name="waktu_masuk" step="1" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"></td>
                </tr>
                <tr>
                    <td><label for="waktu_keluar">Waktu keluar:</label></td>
                    <td><input type="time" id="waktu_keluar" name="waktu_keluar" step="1" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select id="status" name="status">
                            <option value="Hadir" {{ $attendance->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Izin" {{ $attendance->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                            <option value="Sakit" {{ $attendance->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="Alpha" {{ $attendance->status == 'Alpha' ? 'selected' : '' }}>Alpha</option>
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