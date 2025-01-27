@extends('user.layouts.layout')
@section('title', 'Halaman Utama')
@section('user_layout')

    {{-- Welcome User Section --}}
    <div>
    <div class="card border">
        <div class="card-header bg-gray border text-center">
            @php
                $user = Auth::user();
            @endphp
            <h3>{{ Auth::user()->name }}</h3>
                </div>
                    <div class="card-body">
                        <div class="">
                            <p> Kod Sekolah : {{$user->sekolah->kod}}</p>
                            <p> Nama PGB : {{$user->sekolah->pgb}}</p>
                            <p> No Tel : {{Auth::user()->phone_number}}</p>
                            <p> Email : {{Auth::user()->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
    

        {{-- Add Filter Section --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Tapisan</h5>
            </div>
            <div class="card-body">
                <form action="{{route('dashboard')}}" method="GET" class="row g-3">
    
                    <div class="col-md-2">
                        <label class="form-label">Jenis Standard</label>
                        <select name="type" class="form-select">
                            <option value="">Semua</option>
                            @foreach ($types as $type)
                                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="col-md-3">
                        <label class="form-label">Tahun</label>
                        <select name="year" class="form-select">
                            <option value="">Semua</option>
                            @foreach ($listOfYear as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">Semua</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-primary">Tapis</button>
                            <a href="{{route('dashboard')}}" class="btn btn-danger">Set Semula</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    {{-- <div class="col-12 col-lg-8 col-xxl-9 d-flex"> --}}
    <div class="card flex-fill">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Senarai Evidence</h5>
            
            <div>
                <a class="btn btn-success" href="{{ route('create') }}">Cipta Rekod Baharu</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Link Pautan</th>
                        <th>Jenis Standard</th>
                        <th class="d-none d-xl-table-cell">Nota</th>
                        <th class="d-none d-xl-table-cell">Tarikh Hantar</th>
                        <th>Status</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($evidences->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Tiada Rekod Data</td>
                        </tr>
                    @endif
                    @foreach ($evidences as $evidence)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ $evidence->link }}" target="_blank">{{ $evidence->link }}</a></td>
                            <td>{{ $evidence->type }}</td>
                            <td class="d-none d-xl-table-cell" style="word-wrap: break-word;">{{ $evidence->note }}</td>
                            <td class="d-none d-xl-table-cell">{{ $evidence->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if ($evidence->status == 'Diproses')
                                    <span class="badge bg-warning">Diproses</span>
                                @elseif($evidence->status == 'Diluluskan')
                                    <span class="badge bg-success">Diluluskan</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="{{ route('edit', $evidence->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('delete', $evidence->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
