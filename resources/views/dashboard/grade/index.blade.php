@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Grades</h1>
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
  <a href="/grade/create"  type="button" class="btn btn-primary mb-10" >Create New</a>
</div>

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Grades</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$grade["grade"]}}</td>
                <td>
                    <a href="/grade/detail/{{$grade->id}}" type="button" class="btn btn-outline-info">Detail</a>
                    <a href="/grade/edit/{{ $grade->id }}" type="button" class="btn btn-outline-warning">Edit</a>
                    <form id="delete-form-{{ $grade-> id }}" 
                    action="{{ url('/grade/destroy', ['grade' => $grade->id]) }}" method="post" 
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

@endsection