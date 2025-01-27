@extends('user.layouts.layout')
@section('title', 'Edit Evidence')
@section('user_layout')
<h1>Edit Data Evidence</h1>    

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 bg-success text-white" role="alert" id="successAlert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{route('update',$evidence->id)}}" method="POST">
    @csrf

    <!-- First Row: Name, Email, Phone -->
    <div class="form-group mb-3">
        <label for="link">Sila masukkan URL untuk Standard :</label>
        <input type="url" class="form-control" id="link" name="link" value="{{ $evidence->link }}">
    </div>

    <!-- Second Row: std -->
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="type ">Sila masukkan jenis Standard :</label>
            <select class="form-control" id="type" name="type">
                <option value="Standard 1" {{ $evidence->type == 'Standard 1' ? 'selected' : '' }}>Standard 1</option>
                <option value="Standard 2" {{ $evidence->type == 'Standard 2' ? 'selected' : '' }}>Standard 2</option>
                <option value="Standard 3" {{ $evidence->type == 'Standard 3' ? 'selected' : '' }}>Standard 3</option>
                <option value="Standard 4" {{ $evidence->type == 'Standard 4' ? 'selected' : '' }}>Standard 4</option>
            </select>
        </div>
     </div>

    <!-- Third Row: Message -->
    <div class="form-row mb-3">
        <div class="form-group col-md-12">
            <label for="note">Message</label>
            <textarea class="form-control" id="note" name="note" rows="3">{{ $evidence->note }}</textarea>
        </div>
    </div> 

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form> 

    
@endsection