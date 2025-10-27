<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        @extends('master')
        @section('title', 'Data Pegawai')
        @section('content')
        <div class="container mt-5">
            <h1 class="mb-4">Daftar Posisi</h1>
            <a href="{{ route('positions.create') }}">Tambahkan</a>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positions as $position)
                    <tr>
                        <td>{{ $position->nama_jabatan }}</td>
                        <td>{{ $position->gaji_pokok }}</td>
                        <td>
                            <a href="{{ route('positions.show', $position->id) }}">Detail</a> |
                            <a href="{{ route('positions.edit', $position->id) }}">Edit</a> |
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
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