@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Status Calon Siswa</h2>

    <form action="{{ route('status.update', $calonSiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Diproses" {{ $statusSiswa->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Diterima" {{ $statusSiswa->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ $statusSiswa->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>
@endsection