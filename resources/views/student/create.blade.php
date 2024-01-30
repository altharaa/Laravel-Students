@extends('layouts.main')

@section('content')
<a href="/student/all" type="button" class="btn btn-primary">Back</a>
<br><br>
<h1>Add New Student Data</h1>

<form method="post" action="/student/add">   
    @csrf
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="number" class="form-control" id="nis" name="nis" required value="{{ old('nis') }}">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required  value="{{ old('nama') }}">
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required  value="{{ old('tanggal_lahir') }}">  
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <select class="form-select" name="grades_id" id="">
            @if(isset($grades))
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" required value="{{ old('alamat') }}">
    </div>
    <button type="submit" class="btn btn-danger">Tambah</button>
</form>

@endsection