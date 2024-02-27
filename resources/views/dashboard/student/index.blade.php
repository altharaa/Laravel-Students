@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Students</h1>
</div>

<div class="row">
  <div class="col-md-6" >
    <form action="/dashboard/student">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" aria-label="Search" value="{{request('search')}}">
        <button class="btn btn-primary" type="submit" id="button-addon2" >Search</button>
      </div>
    </form>
  </div>
</div>

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-warning sol-lg-12" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div>
  <a href="/student/create"  type="button" class="btn btn-primary mb-10" >Create New</a>
</div>
<br>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Name</th>
                <th scope="col">Grade</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$student["nis"]}}</td>
                <td>{{$student->nama}}</td>
                <td>{{$student->grades->grade}}</td>
                <td>
                    <a href="/dashboard/student/detail/{{$student->id}}" type="button" class="btn btn-outline-info">Detail</a>
                    <a href="/student/edit/{{ $student->id }}" type="button" class="btn btn-outline-warning">Edit</a>
                    <form id="delete-form-{{ $student-> id }}" 
                    action="{{ url('/student/destroy', ['student' => $student->id]) }}" method="post" 
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger" 
                        onclick="return confirm('Are you sure you want to delete the data?')">Delete</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
  {{ $students->links()}}
</div>

@endsection