@extends('master')

@section('title', 'Department')
@section('active-department', 'active')
@section('sub-title', 'Department List')
@section('caption', 'Page')

@section('button-add')
    <button class="btn btn-dark me-2" type="button" onclick="window.location.href='/departments/create'">Add Data</button>
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
                <th scope="col" class="px-2 text-muted">Department</th>
                <th scope="col" class="px-2 text-muted">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td class="px-2">{{ $departments->firstItem() + $loop->index }}</td>
                <td class="px-2">{{ $department->nama_departemen }}</td>
                <td class="px-2">
                    <div class="d-flex gap-2">
                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $department->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <form id="delete-form-{{ $department->id }}" action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display: none;">
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

    @if ($departments->hasPages())
    <div class="pagination-wrapper mt-4 px-10">
        <ul class="pagination">
            <li>
                <a href="{{ $departments->previousPageUrl() }}" class="pagination-btn nav-btn {{ $departments->onFirstPage() ? 'disabled' : '' }}"
                @if($departments->onFirstPage()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </a>
            </li>

            @foreach ($departments->getUrlRange(max(1, $departments->currentPage() - 2), min($departments->lastPage(), $departments->currentPage() + 2)) as $page => $url)
                <li>
                    <a href="{{ $url }}" 
                    class="pagination-btn {{ $departments->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

            @if ($departments->currentPage() < $departments->lastPage() - 2)
                <li><span class="pagination-ellipsis">...</span></li>
                <li>
                    <a href="{{ $departments->url($departments->lastPage()) }}" class="pagination-btn">
                        {{ $departments->lastPage() }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ $departments->nextPageUrl() }}" 
                class="pagination-btn nav-btn {{ !$departments->hasMorePages() ? 'disabled' : '' }}"
                @if(!$departments->hasMorePages()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </li>
        </ul>

        <div class="pagination-info">
            Showing {{ $departments->firstItem() ?? 0 }} to {{ $departments->lastItem() ?? 0 }} of {{ $departments->total() }} departments
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