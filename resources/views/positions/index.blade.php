@extends('master')

@section('title', 'Position')
@section('active-position', 'active')
@section('sub-title', 'Position List')
@section('caption', 'Page')

@section('button-add')
    <button class="btn btn-dark me-2" type="button" onclick="window.location.href='/positions/create'">Add Data</button>
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
                <th scope="col" class="px-2 text-muted">#</th>
                <th scope="col" class="px-2 text-muted">Nama Jabatan</th>
                <th scope="col" class="px-2 text-muted">Gaji Pokok</th>
                <th scope="col" class="px-2 text-muted">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
            <tr>
                <td class="px-2">{{ $positions->firstItem() + $loop->index }}</td>
                <td class="px-2">{{ $position->nama_jabatan }}</td>
                <td class="px-2">Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                <td class="px-2">
                    <div class="d-flex gap-2">
                        <a href="{{ route('positions.show', $position->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $position->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <form id="delete-form-{{ $position->id }}" action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display: none;">
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

    @if ($positions->hasPages())
    <div class="pagination-wrapper mt-4 px-10">
        <ul class="pagination">
            <li>
                <a href="{{ $positions->previousPageUrl() }}" class="pagination-btn nav-btn {{ $positions->onFirstPage() ? 'disabled' : '' }}"
                @if($positions->onFirstPage()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </a>
            </li>

            @foreach ($positions->getUrlRange(max(1, $positions->currentPage() - 2), min($positions->lastPage(), $positions->currentPage() + 2)) as $page => $url)
                <li>
                    <a href="{{ $url }}" 
                    class="pagination-btn {{ $positions->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

            @if ($positions->currentPage() < $positions->lastPage() - 2)
                <li><span class="pagination-ellipsis">...</span></li>
                <li>
                    <a href="{{ $positions->url($positions->lastPage()) }}" class="pagination-btn">
                        {{ $positions->lastPage() }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ $positions->nextPageUrl() }}" 
                class="pagination-btn nav-btn {{ !$positions->hasMorePages() ? 'disabled' : '' }}"
                @if(!$positions->hasMorePages()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </li>
        </ul>

        <div class="pagination-info">
            Showing {{ $positions->firstItem() ?? 0 }} to {{ $positions->lastItem() ?? 0 }} of {{ $positions->total() }} positions
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