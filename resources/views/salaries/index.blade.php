@extends('master')

@section('title', 'Salary')
@section('active-salary', 'active')
@section('sub-title', 'Salary List')
@section('caption', 'Page')

@section('button-add')
    <button class="btn btn-dark me-2" type="button" onclick="window.location.href='/salaries/create'">Add Data</button>
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
                <th>Bulan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
                @foreach($salaries as $salary)
            <tr>
                <td class="px-2">{{ $salaries->firstItem() + $loop->index }}</td>
                <td class="px-2">{{ $salary->employee?->nama_lengkap ?? '-' }}</td>
                <td class="px-2">{{ $salary->bulan }}</td>
                <td class="px-2">Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                <td class="px-2">Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                <td class="px-2">Rp {{ number_format($salary->potongan, 2, ',', '.') }}</td>
                <td class="px-2 fw-semibold">Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</td>
                <td class="px-2">
                    <div class="d-flex gap-2">
                        <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $salary->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <form id="delete-form-{{ $salary->id }}" action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:none;">
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

    @if ($salaries->hasPages())
    <div class="pagination-wrapper mt-4 px-10">
        <ul class="pagination">
            <li>
                <a href="{{ $salaries->previousPageUrl() }}" 
                   class="pagination-btn nav-btn {{ $salaries->onFirstPage() ? 'disabled' : '' }}"
                   @if($salaries->onFirstPage()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </a>
            </li>

            @foreach ($salaries->getUrlRange(max(1, $salaries->currentPage() - 2), min($salaries->lastPage(), $salaries->currentPage() + 2)) as $page => $url)
                <li>
                    <a href="{{ $url }}" class="pagination-btn {{ $salaries->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

            @if ($salaries->currentPage() < $salaries->lastPage() - 2)
                <li><span class="pagination-ellipsis">...</span></li>
                <li>
                    <a href="{{ $salaries->url($salaries->lastPage()) }}" class="pagination-btn">
                        {{ $salaries->lastPage() }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ $salaries->nextPageUrl() }}" 
                   class="pagination-btn nav-btn {{ !$salaries->hasMorePages() ? 'disabled' : '' }}"
                   @if(!$salaries->hasMorePages()) aria-disabled="true" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </li>
        </ul>

        <div class="pagination-info">
            Showing {{ $salaries->firstItem() ?? 0 }} to {{ $salaries->lastItem() ?? 0 }} of {{ $salaries->total() }} salaries
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
            confirmButtonColor: "#dc3545",
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