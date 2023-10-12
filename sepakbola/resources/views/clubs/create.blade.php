@extends('layouts.app')
@section('content')
<h2>Input Data Klub</h2>
<form action="{{ route('clubs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="namaKlub" class="form-label">Nama Klub</label>
        <input type="text" class="form-control" id="namaKlub" name="nama" required>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="kotaKlub" class="form-label">Kota Klub</label>
        <input type="text" class="form-control" id="kotaKlub" name="kota" required>
    </div>
    <button class="btn btn-primary" type="submit">Button</button>
</form>
@endsection

