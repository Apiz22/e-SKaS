@extends('user.layouts.layout')

@section('title', 'Aspek 1.1')
@section('user_layout')
    @foreach($tables as $table)
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ $table['title'] }}</h5>
            </div>
            <div class="card-body">
              
                <div class="mb-3">
                    <table class="table table-striped table-bordered my-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table['data'] as $index => $row)
                                <tr>
                                    <td>{{ chr(97 + $index) }}</td>
                                    <td>{{ $row['description'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Second Table for Jenis Standard, Sub Standard, Status, and Action --}}
                <table class="table table-striped table-bordered my-0">
                    <thead class="table-light">
                        <tr>
                            <th>Link pautan</th>
                            <th>Jenis Standard</th>
                            <th>Sub Standard</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table['data'] as $index => $row)
                            <tr>
                                <td>
                                    @if (isset($row['evidence']))
                                        <span class="badge bg-primary">
                                            <a href="{{ $row['evidence']['link'] }}" 
                                               class="text-white text-decoration-none" 
                                               target="_blank">
                                                View Evidence
                                            </a>
                                        </span>
                                    @else
                                        <span class="text-muted">Tiada Link Pautan Tersedia</span>
                                    @endif
                                </td>
                                <td>{{ $row['type'] }}</td>
                                <td>{{ $row['id'] }}</td>
                                <td>
                                    @if (isset($row['evidence']))
                                        <span class="badge bg-{{ $row['evidence']['status'] === 'Completed' ? 'success' : 'warning' }}">
                                            {{ $row['evidence']['status'] }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">Tiada Status</span>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($row['evidence']))
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-warning edit-btn" 
                                                data-id="{{ $row['evidence']['id'] }}"
                                                data-link="{{ $row['evidence']['link'] }}"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editModal">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('evidence.destroy', $row['evidence']['id']) }}" 
                                                method="POST" 
                                                class="d-inline" 
                                                onsubmit="return confirm('Are you sure you want to delete this evidence?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <button class="btn btn-sm btn-primary add-btn" 
                                            data-sub="{{ $row['id'] }}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#addModal">
                                            <i class="fas fa-plus"></i> Add Link
                                        </button>
                                    @endif                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Evidence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('evidence.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="sub_id" id="sub_id">
                        <div class="mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" name="link" required 
                                   placeholder="Enter evidence link">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Evidence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" name="link" id="edit_link" required
                                   placeholder="Update evidence link">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Add button click
        const addButtons = document.querySelectorAll('.add-btn');
        const editButtons = document.querySelectorAll('.edit-btn');
        
        addButtons.forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('sub_id').value = this.dataset.sub;
            });
        });

        // Handle Edit button click
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const { id, link } = this.dataset;
                document.getElementById('edit_link').value = link;
                document.getElementById('editForm').action = `/evidence/${id}`;
            });
        });
    });
</script>
@endpush