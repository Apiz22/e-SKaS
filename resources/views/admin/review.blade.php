@extends('admin.layouts.layout')
@section('title','Semak Eviden')

@section('admin_layout')
<h1>Semak Eviden</h1>    

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 bg-success text-white" role="alert" id="successAlert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{route('review.admin', $evidence->id)}}" method="POST">
    @csrf

    <!-- First Row: Name, Email, Phone -->
    <div class="form-group bm-3 col-md-6">
        <label for="name">Nama Pengisi:</label>
        <input type ="text" class="form-control" id="name" value="{{$user->name}}" disabled> 
    </div>

    <div class="form-group bm-3 col-md-6">
        <label for="name">Nama Sekolah:</label>
        <input type ="text" class="form-control" id="name" value="{{$user->sekolah->nama}}" disabled> 
    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="link">Link</label>
        <a href="{{ $evidence->link }}" class="form-control" id="link" target="_blank" rel="noopener noreferrer">{{ $evidence->link }}</a>
    </div>

    <!-- Second Row: std -->
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="type">Jenis Standard :</label>
            <select class="form-control" id="type" name="type" disabled>
                <option value="Standard 1" {{ $evidence->type == 'Standard 1' ? 'selected' : '' }}>Standard 1</option>
                <option value="Standard 2" {{ $evidence->type == 'Standard 2' ? 'selected' : '' }}>Standard 2</option>
                <option value="Standard 3" {{ $evidence->type == 'Standard 3' ? 'selected' : '' }}>Standard 3</option>
                <option value="Standard 4" {{ $evidence->type == 'Standard 4' ? 'selected' : '' }}>Standard 4</option>
            </select>
        </div>
     </div>

     <div class="form-group col-md-6">
        <label for="link">Aspek : </label>
        <input type="text" class="form-control" id="sub" name="sub" value="{{ $evidence->sub}}" disabled>
    </div>

     <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                {{-- <option value="">Select Status</option> --}}
                <option value="Diproses" {{ $evidence->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Diluluskan" {{$evidence->status == 'Diluluskan' ? 'selected' : '' }}>Diluluskan</option>
                <option value="Ditolak" {{ $evidence->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
     </div>
    <!-- Third Row: Message -->
    <div class="form-row mb-3">
        <div class="form-group col-md-12">
            <label for="note">Nota</label>
            <textarea class="form-control" id="note" name="note" rows="3">{{ $evidence->note }}</textarea>
        </div>
    </div> 

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form> 
@endsection