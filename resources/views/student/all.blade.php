@extends('layouts.main')

@section('content')
<table class="table">
<h1>Data Siswa</h1>
<a href="/student/create"  type="button" class="btn btn-primary">Create New</a>
<br><br/>
@if (session('success'))
  <div class="alert alert-success sol-lg-12" role="alert">
    {{ session('success') }}
  </div>
@endif
<table class="table">
  <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">NIS</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$student["nis"]}}</td>
        <td>{{$student["nama"]}}</td>
        <td>{{$student->grades->grade}}</td>
        <td>
            <a href="/student/detail/{{$student->id}}" type="button" class="btn btn-outline-info">Detail</a>
            <a href="/student/edit/{{ $student->id }}" type="button" class="btn btn-outline-warning">Edit</a>
            <form id="delete-form-{{ $student-> id }}" 
              action="{{ url('/student/destroy', ['student' => $student->id]) }}" method="post" 
              class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah kamu yakin untuk menghapus data?')">Delete</button> 
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection