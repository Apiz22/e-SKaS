@extends('admin.layouts.layout')
@section('title', 'Register User')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('admin_layout')
    <h1>Daftar Pengguna</h1>
    <form method="POST" action="{{ route('store.user') }}">
        @csrf

        <!-- Name -->
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <!-- Email Address -->
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" name="email" required/>
            {{-- @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
        </div>

        <div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="category">Sila Pilih Jenis Sekolah:</label required>
                <select class="form-control" id="category" name="category">
                    <option value="Sekolah Rendah Kebangsaan">Sekolah Kebangsaan</option>
                    <option value="Sekolah Jenis Kebangsaan Cina">Sekolah Jenis Kebangsaan Cina</option>
                    <option value="Sekolah Jenis Kebangsaan Tamil">Sekolah Jenis Kebangsaan Tamil</option>
                    <option value="Sekolah Menengah">Sekolah Menengah</option>
                    <option value="Sekolah Menengah Agama">Sekolah Menengah Agama</option>
                </select>
            </div>
         </div>

         <div class="form-group mb-3">
            <label for="phone_number">No Telefon</label>
            <input id="phone_number" class="form-control" type="tel" pattern="[0-9]{10,15}" 
            placeholder="e.g., 0123456789" name="phone_number" maxlength="15" required/>
         </div>

         <div class="form-group mb-3">
            <label for="kod">Kod Sekolah</label>
            <input id="kod" class="form-control" name="kod"/>
         </div>

        <div class="form-group mb-3">
            <label for="pgb">PGB</label>
            <input id="pgb" class="form-control" name="pgb"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Kata laluan</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            {{-- @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
            {{-- Confirm Password --}}
        <div class="mt-4">
            <label for="password_confirmation">Pengesahan Kata Laluan</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            {{-- @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>

@endsection
