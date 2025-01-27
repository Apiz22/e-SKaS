@extends('user.layouts.layout')
@section('title', 'Standard Baharu')

@section('user_layout')

    <h1>Masukkan Maklumat Standard Baharu</h1>    

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 bg-success text-white" role="alert" id="successAlert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{route('store')}}" method="POST">
        @csrf

        <!-- First Row: Name, Email, Phone -->
        <div class="form-group mb-3">
            <label for="link">Sila masukkan URL untuk Standard :</label>
            <input type="url" class="form-control" id="link" name="link" required>
        </div>

        <!-- Second Row: std -->
        <div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="sub">Sila masukkan jenis Standard :</label required>
                <select class="form-select custom-select" id="sub" name="sub">
                    <option value="">Sila Pilih Standard</option>
                    <optgroup label="Standard 1" class="optgroup-standard">
                        <optgroup label="Aspek 1.1" class="optgroup-aspek">
                            <option value="1.1.1">Aspek 1.1.1</option>
                            <option value="1.1.2">Aspek 1.1.2</option>
                            <option value="1.1.3">Aspek 1.1.3</option>
                            <option value="1.1.4">Aspek 1.1.4</option>
                            <option value="1.1.5">Aspek 1.1.5</option>
                            <option value="1.1.6">Aspek 1.1.6</option>
                            <option value="1.1.7">Aspek 1.1.7</option>
                        </optgroup>
                        <optgroup label="Aspek 1.2" class="optgroup-aspek">
                            <option value="1.2.1">Aspek 1.2.1</option>
                            <option value="1.2.2">Aspek 1.2.2</option>
                        </optgroup>
                        <optgroup label="Aspek 1.3" class="optgroup-aspek">
                            <option value="1.3.1">Aspek 1.3.1</option>
                            <option value="1.3.2">Aspek 1.3.2</option>
                            <option value="1.3.3">Aspek 1.3.3</option>
                        </optgroup>
                    </optgroup>
                    <optgroup label="Standard 2" class="optgroup-standard">
                        <optgroup label="Aspek 2.1" class="optgroup-aspek">
                            <option value="2.1.1">Aspek 2.1.1</option>
                            <option value="2.1.2">Aspek 2.1.2</option>
                        </optgroup>
                        <optgroup label="Aspek 2.2" class="optgroup-aspek">
                            <option value="2.2.1">Aspek 2.2.1</option>
                        </optgroup>
                        <optgroup label="Aspek 2.3" class="optgroup-aspek">
                            <option value="2.3.1">Aspek 2.3.1</option>
                        </optgroup>
                        <optgroup label="Aspek 2.4" class="optgroup-aspek">
                            <option value="2.4.1">Aspek 2.4.1</option>
                        </optgroup>
                        <optgroup label="Aspek 2.5" class="optgroup-aspek">
                            <option value="2.5.1">Aspek 2.5.1</option>
                            <option value="2.5.2">Aspek 2.5.2</option>
                        </optgroup>
                        <optgroup label="Aspek 2.6" class="optgroup-aspek">
                            <option value="2.6.1">Aspek 2.6.1</option>
                        </optgroup>
                        <optgroup label="Aspek 2.7" class="optgroup-aspek">
                            <option value="2.7.1">Aspek 2.7.1</option>
                        </optgroup>
                    </optgroup>
                    <optgroup label="Standard 3" class="optgroup-standard">
                        <option value="3.1.1">Aspek 3.1.1</option>
                        <option value="3.1.2">Aspek 3.1.2</option>
                        <optgroup label="Sub Aspek 3.1.1" class="optgroup-aspek">
                            <option value="3.1.1.1">Aspek 3.1.1.1</option>
                            <option value="3.1.1.2">Aspek 3.1.1.2</option>
                        </optgroup>
                    </optgroup>
                    <optgroup label="Standard 4" class="optgroup-standard">
                        <option value="4.1.1">Aspek 4.1.1</option>
                        <option value="4.2.1">Aspek 4.2.1</option>
                        <option value="4.2.2">Aspek 4.2.2</option>
                        <option value="4.3.1">Aspek 4.3.1</option>
                        <option value="4.4.1">Aspek 4.4.1</option>
                        <option value="4.4.2">Aspek 4.4.2</option>
                        <option value="4.5.1">Aspek 4.5.1</option>
                        <option value="4.6.1">Aspek 4.6.1</option>
                    </optgroup>
                </select>
            </div>
         </div>

         {{-- <div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="sub_id">Sila masukkan jenis sub Standard :</label required>
                <select class="form-select" id="sub_id" name="sub_id">
                    <option value="">Sila Pilih sub Standard</option>
                    <option value="1">1.1.1.a</option>
                    <option value="2">1.1.1.b</option>
                    <option value="3">1.1.1.c</option>
                    <option value="4">1.1.1.d</option>
                </select>
            </div>
         </div> --}}

        <!-- Third Row: Message -->
        <div class="form-row mb-3">
            <div class="form-group col-md-12">
                <label for="note">Message</label>
                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
            </div>
        </div> 

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 

    {{-- @push('scripts')
    <script>
        // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Get the success alert element
            const successAlert = document.getElementById('successAlert');
            
            if (successAlert) {
                // Set timeout to hide the alert after 4 seconds
                setTimeout(function() {
                    // Create a Bootstrap alert instance and hide it
                    const bsAlert = new bootstrap.Alert(successAlert);
                    bsAlert.close();
                }, 2000); // 4000 milliseconds = 4 seconds
            }
        });
    </script>
    @endpush --}}

@endsection

<style>
.custom-select {
    background-color: #f8f9fa; /* Light background */
    border: 1px solid #ced4da; /* Border color */
    border-radius: 0.25rem; /* Rounded corners */
    }

.optgroup-standard {
    font-weight: bold; /* Bold for standard groups */
    color: #007bff; /* Blue color for standard groups */
    text-align: center; Center text for standard groups
}

.optgroup-aspek {
    font-style: italic; /* Italic for aspect groups */
    color: #6c757d; /* Grey color for aspect groups */
    /* text-align: center; Center text for aspect groups */
}
</style>