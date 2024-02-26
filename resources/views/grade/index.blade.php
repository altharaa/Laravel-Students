@extends('layouts.main')

@section('content')
<table class="table">

<table class="table">
  <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Grade</th>
    </tr>
  </thead>
  <tbody>
    @foreach($grades as $grade)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$grade["grade"]}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection