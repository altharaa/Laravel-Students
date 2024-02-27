@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Student Detail</h1>
    </div>
    <br/>
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            {{$student->nis}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$student->nama}}</li>
            <li class="list-group-item">{{$student->tanggal_lahir}}</li>
            <li class="list-group-item">{{$student->grades->grade}}</li>
            <li class="list-group-item">{{$student->alamat}}</li>
        </ul>
    </div>
    <br>
    <a href="/dashboard/student" class="btn btn-primary">Back</a>
@endsection