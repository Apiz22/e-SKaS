@extends('admin.layouts.layout')
@section('title', 'Admin Dashboard')
@section('admin_layout')

    {{-- Add Filter Section --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Tapisan</h5>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Tapisan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="row g-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Nama Sekolah</label>
                            <select name="sekolah" class="form-select">
                                <option value="">Semua</option>
                                @foreach ($sekolahList as $id => $nama)
                                    <option value="{{ $nama }}" {{ request('sekolah') == $nama ? 'selected' : '' }}>
                                        {{ $nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Jenis Sekolah</label>
                            <select name="sekolah_type" class="form-select">
                                <option value="">Semua</option>
                                @foreach ($sekolahTypes as $jenis)
                                    <option value="{{ $jenis }}" {{ request('sekolah_type') == $jenis ? 'selected' : '' }}>
                                        {{ $jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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
                        <div class="col-md-2">
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
                    </div>
        
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <label class="form-label">&nbsp;</label>
                            <div>
                                <button type="submit" class="btn btn-primary">Tapis</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger ms-2">Set Semula</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    {{-- <div class="col-12 col-lg-8 col-xxl-9 d-flex"> --}}
    <div class="card flex-fill">
        <div class="card-header">

            <h5 class="card-title mb-0">Senarai Evidence</h5>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered my-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Pengisi</th>
                            <th class="text-center">Nama Sekolah</th>
                            <th class="text-center  d-xl-table-cell">Link Pautan</th>
                            <th class="text-center">Jenis Standard</th>
                            <th class="text-center">Nota</th>
                            <th class="text-center  d-xl-table-cell">Tahun</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tarikh Kemaskini</th>
                            <th class="text-center  d-md-table-cell">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($evidences->isEmpty())
                            <tr>
                                <td colspan="10" class="text-center">Rekod tidak ditemui</td>
                            </tr>
                        @endif
                        @foreach ($evidences as $evidence)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $evidence->user->name }}</td>
                                <td>{{ Auth::user()->sekolah->nama }}</td>
                                <td class="d-xl-table-cell"><a href="{{ $evidence->link }}" target="_blank">{{ $evidence->link }}</a></td>
                                <td class="text-center">{{ $evidence->type }}<br>Aspek {{$evidence->sub}}</td>
                                <td style="word-wrap: break-word; max-width: 150px;">{{ $evidence->note }}</td>
                                <td class="d-xl-table-cell text-center">{{ $evidence->created_at->format('Y') }}</td>
                                <td>
                                    @if ($evidence->status == 'Diproses')
                                        <span class="badge bg-warning">Diproses</span>
                                    @elseif($evidence->status == 'Diluluskan')
                                        <span class="badge bg-success">Diluluskan</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td class="text-center d-xl-table-cell">{{ $evidence->updated_at->format('d/m/Y') }}</td>
                                <td class="d-md-table-cell">
                                    <a href="{{ route('review', $evidence->id) }}" class="btn btn-primary btn-sm">Semak</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
