@extends('master')

@section('title', 'Employee')
@section('active-employee', 'active')
@section('sub-title', 'Employee List')
@section('caption', 'Page')

@section('button-add')
    <button class="btn btn-dark me-2" type="button" onclick="window.location.href='/employees/create'">Add Data</button>
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
                <th scope="col" class="px-2 text-muted">Name</th>
                <th scope="col" class="px-2 text-muted">Email</th>
                <th scope="col" class="px-2 text-muted">Phone</th>
                <th scope="col" class="px-2 text-muted">Birth</th>
                <th scope="col" class="px-2 text-muted">Address</th>
                <th scope="col" class="px-2 text-muted">Start Date</th>
                <th scope="col" class="px-2 text-muted">Status</th>
                <th scope="col" class="px-2 text-muted">Department</th>
                <th scope="col" class="px-2 text-muted">Position</th>
                <th scope="col" class="px-2 text-muted">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td class="px-2">{{ $employees->firstItem() + $loop->index }}</td>
                <td class="px-2">{{ $employee->nama_lengkap }}</td>
                <td class="px-2">{{ $employee->email }}</td>
                <td class="px-2">{{ $employee->nomor_telepon }}</td>
                <td class="px-2">{{ $employee->tanggal_lahir }}</td>
                <td class="px-2">{{ $employee->alamat }}</td>
                <td class="px-2">{{ $employee->tanggal_masuk }}</td>
                <td class="px-2">{{ $employee->status }}</td>
                <td class="px-2">{{ $employee->department?->nama_departemen }}</td>
                <td class="px-2">{{ $employee->position?->nama_jabatan }}</td>
                <td class="px-2">
                    <div class="d-flex gap-2">
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $employee->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: none;">
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

    @if ($employees->hasPages())
    <div class="pagination-wrapper mt-4 px-10">
        <ul class="pagination">
            <li>
                <a href="{{ $employees->previousPageUrl() }}" class="pagination-btn nav-btn {{ $employees->onFirstPage() ? 'disabled' : '' }}"
                @if($employees->onFirstPage()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </a>
            </li>

            @foreach ($employees->getUrlRange(max(1, $employees->currentPage() - 2), min($employees->lastPage(), $employees->currentPage() + 2)) as $page => $url)
                <li>
                    <a href="{{ $url }}" 
                    class="pagination-btn {{ $employees->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

            @if ($employees->currentPage() < $employees->lastPage() - 2)
                <li><span class="pagination-ellipsis">...</span></li>
                <li>
                    <a href="{{ $employees->url($employees->lastPage()) }}" class="pagination-btn">
                        {{ $employees->lastPage() }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ $employees->nextPageUrl() }}" 
                class="pagination-btn nav-btn {{ !$employees->hasMorePages() ? 'disabled' : '' }}"
                @if(!$employees->hasMorePages()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </li>
        </ul>

        <div class="pagination-info">
            Showing {{ $employees->firstItem() ?? 0 }} to {{ $employees->lastItem() ?? 0 }} of {{ $employees->total() }} employees
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