@extends('layouts.main')

@section('content')
    <h1>Student Details</h1>
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
    <a href="/student/all" class="btn btn-primary">Back</a>

@endsection