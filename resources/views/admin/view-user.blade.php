@extends('admin.layouts.layout')
@section('title','View User')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('admin_layout')
<div class="card flex-fill">
    <div class="card-header">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Senarai User</h5>
            <a class="btn btn-success btn-sm" href="{{route('register.user')}}">Tambah Pengguna</a>
        </div>
    </div>
    <table class="table table-hover my-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Sekolah</th>
                <th>Jenis Sekolah</th>
                <th class="d-none d-md-table-cell">Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">No data found</td>
                </tr>
            @endif
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->category}}</td>
                    <td class="d-none d-xl-table-cell">{{ $user->email }}</td>
                    <td>
                        <a href="{{route('admin.view.user.detail',$user->id)}}" class="btn btn-primary btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection