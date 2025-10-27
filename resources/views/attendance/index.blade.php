<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        @extends('master')
        @section('title', 'Data Pegawai')
        @section('content')
        <div class="container mt-5">
            <h1 class="mb-4">Daftar Departemen</h1>
            <a href="{{ route('attendance.create') }}">Tambahkan</a>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Karyawan</th>
                        <th>Tanggal</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendance as $attendance)
                    <tr>
                        <td>{{ $attendance->employee?->nama_lengkap ?? '-' }}</td>
                        <td>{{ $attendance->tanggal }}</td>
                        <td>{{ $attendance->waktu_masuk }}</td>
                        <td>{{ $attendance->waktu_keluar }}</td>
                        <td>{{ $attendance->status }}</td>
                        <td>
                            <a href="{{ route('attendance.show', $attendance->id) }}">Detail</a> |
                            <a href="{{ route('attendance.edit', $attendance->id) }}">Edit</a> |
                            <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection
    </body>
</html>