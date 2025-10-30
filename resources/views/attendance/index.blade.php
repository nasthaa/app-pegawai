@extends('master')

@section('title', 'Attendance')
@section('active-attendance', 'active')
@section('sub-title', 'Attendance List')
@section('caption', 'Page')

@section('button-add')
    <button class="btn btn-dark me-2" type="button" onclick="window.location.href='/attendance/create'">Add Data</button>
@endsection

@section('content')
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mt-4 mb-3 rounded-3" role="alert" style="background-color: #e8f8e8; border-color: #d1f0d1;">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-circle-check me-2 text-success fs-5"></i>
            <span class="fw-semibold text-success">{{ session('success') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="table-responsive mt-3">
    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Karyawan</th>
                <th>Tanggal</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendance as $item)
            <tr>
                <td class="px-2">{{ $attendance->firstItem() + $loop->index }}</td>
                <td class="px-2">{{ $item->employee?->nama_lengkap ?? '-' }}</td>
                <td class="px-2">{{ $item->tanggal }}</td>
                <td class="px-2">{{ $item->waktu_masuk }}</td>
                <td class="px-2">{{ $item->waktu_keluar }}</td>
                <td class="px-2">{{ $item->status }}</td>
                <td class="px-2">
                    <div class="d-flex gap-2">
                        <a href="{{ route('attendance.show', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('attendance.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $item->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <form id="delete-form-{{ $item->id }}" action="{{ route('attendance.destroy', $item->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @if ($attendance->hasPages())
    <div class="pagination-wrapper mt-4 px-10">
        <ul class="pagination">
            <li>
                <a href="{{ $attendance->previousPageUrl() }}" class="pagination-btn nav-btn {{ $attendance->onFirstPage() ? 'disabled' : '' }}"
                @if($attendance->onFirstPage()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </a>
            </li>

            @foreach ($attendance->getUrlRange(max(1, $attendance->currentPage() - 2), min($attendance->lastPage(), $attendance->currentPage() + 2)) as $page => $url)
                <li>
                    <a href="{{ $url }}" 
                    class="pagination-btn {{ $attendance->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

            @if ($attendance->currentPage() < $attendance->lastPage() - 2)
                <li><span class="pagination-ellipsis">...</span></li>
                <li>
                    <a href="{{ $attendance->url($attendance->lastPage()) }}" class="pagination-btn">
                        {{ $attendance->lastPage() }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ $attendance->nextPageUrl() }}" 
                class="pagination-btn nav-btn {{ !$attendance->hasMorePages() ? 'disabled' : '' }}"
                @if(!$attendance->hasMorePages()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </li>
        </ul>

        <div class="pagination-info">
            Showing {{ $attendance->firstItem() ?? 0 }} to {{ $attendance->lastItem() ?? 0 }} of {{ $attendance->total() }} attendance
        </div>
    </div>
    @endif
    
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "Are you sure you want to delete this?",
            text: "Deleted data cannot be recovered!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545", // merah
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection