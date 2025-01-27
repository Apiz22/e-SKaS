@extends('user.layouts.layout')

@section('title', 'Aspek 1.1')
@section('user_layout')
    {{-- Loop through each table --}}
    @foreach($tables as $key => $table)
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{$table['title'] }} </h5>
                 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Evidence</button>
            </div>
                <div class="card-body">
                    <div class="container">
                        <h4>Kriteria Kritikal</h4>
                        <p>{{$table['description']}}</p>
                        <h4>Tindakan</h4>
                        <p>{{$table['Tindakan']}}</p>
                    </div>      
                <div>
                    <table class="table table-striped table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($table['subtypes']->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Tiada Rekod Data</td>
                            </tr>
                            @endif
                            @foreach ($table['subtypes'] as $subtype)
                                <tr>
                                    <td class="text-center">{{ chr(96 + $loop->iteration) }}</td>
                                    <td>{{ $subtype->description }}</td>
                                    {{-- <td>{{ $subtype->type}}</td>
                                    <td>{{ $subtype->id }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped table-bordered my-0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Link pautan</th>
                            <th class="text-center">Jenis Standard</th>
                            {{-- <th>Sub Standard</th> --}}
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if ($table['evidences']->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Tiada Rekod Data</td>
                            </tr>
                            @endif
                        @foreach ($table['evidences'] as $evidence)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">
                                    <a href="{{ $evidence->link }}" target="_blank">{{ $evidence->link }}</a>
                            </td>
                            <td class="text-center">{{$evidence->type}}</td>
                            <td>
                                @if ($evidence->status == 'Diproses')
                                    <span class="badge bg-warning">Diproses</span>
                                @elseif($evidence->status == 'Diluluskan')
                                    <span class="badge bg-success">Diluluskan</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    @if ($evidence)
                                        <button class="btn btn-sm btn-warning edit-btn me-2" 
                                            data-id="{{ $evidence->id }}"
                                            data-link="{{ $evidence->link }}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal">Edit
                                        </button>
                                        <form action="{{ route('evidence.destroy', $evidence->id) }}" 
                                            method="POST" 
                                        class="d-inline" 
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-primary add-btn" 
                                        data-sub="{{ $evidence->id }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#addModal">Add Link</button>
                                @endif                   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endforeach

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
                        <input type="hidden" name="sub" id="sub">
                        <div class="mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" name="link" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nota</label>
                            <textarea class="form-control" name="message" rows="3" ></textarea>
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
                            <input type="text" class="form-control" name="link" id="edit_link" required>
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
        // Handle Add Evidence button click (from card header)
        document.querySelectorAll('[data-bs-target="#addModal"]').forEach(button => {
            button.addEventListener('click', function() {
                // Get the card title from the closest card-header
                const cardHeader = this.closest('.card-header');
                if (cardHeader) {
                    const title = cardHeader.querySelector('.card-title').textContent;
                    document.getElementById('sub').value = title;
                }
            });
        });

        // Handle Add button click (from table)
        document.querySelectorAll('.add-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('sub').value = this.dataset.sub;
            });
        });

        // Handle Edit button click
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const link = this.dataset.link;
                
                document.getElementById('edit_link').value = link;
                document.getElementById('editForm').action = `/evidence/${id}`;
            });
        });
    });
</script>
@endpush
