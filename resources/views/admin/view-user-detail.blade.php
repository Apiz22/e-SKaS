@extends('admin.layouts.layout')
@section('title','View User Detail')
@section('admin_layout')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="mb-0">Maklumat: {{$user->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                        <label for="name">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" disabled>
                                </div>
                                <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                                </div>
                                <div class="col-md-4">
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" value="{{$user->category}}" disabled>
                                </div>
                                <div class="col-md-4">
                                        <label for="kod">Kod</label>
                                        <input type="text" class="form-control" id="kod" name="kod" value="{{$user->kod}}" disabled>
                                </div>
                                <div class="col-md-4">
                                        <label for="pgb">Pgb</label>
                                        <input type="text" class="form-control" id="pgb" name="pgb" value="{{$user->pgb}}" disabled>
                                </div>
                                <div class="col-12">
                                        <label for="phone">No Telefon</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone_number}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" id="editButton" class="btn btn-warning">
                                    <i class="fas fa-edit me-2"></i>Edit
                                </button>
                                <button type="submit" id="submitButton" class="btn btn-success" disabled>
                                    <i class="fas fa-save me-2"></i>Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            const inputs = document.querySelectorAll('.form-control');
            const submitButton = document.getElementById('submitButton');
            const editButton = document.getElementById('editButton');
            
            inputs.forEach(input => {
                input.disabled = !input.disabled;
            });
            
            submitButton.disabled = !submitButton.disabled;
            
            if (submitButton.disabled) {
                editButton.classList.remove('btn-danger');
                editButton.classList.add('btn-warning');
                editButton.innerHTML = '<i class="fas fa-edit me-2"></i>Edit';
            } else {
                editButton.classList.remove('btn-warning');
                editButton.classList.add('btn-danger');
                editButton.innerHTML = '<i class="fas fa-times me-2"></i>Cancel';
            }
        });
    </script>

@endsection