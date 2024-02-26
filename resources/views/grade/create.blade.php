@extends('layouts.main')

@section('content')
<div class="container">
    <a href="/dashboard/student" type="button" class="btn btn-primary mb-3">
        <i class="bi bi-box-arrow-left"></i>
        Back
    </a>
    <h1 style="text-align: center;">Add New Grade Data</h1>

    <form method="post" action="/grade/add">   
        @csrf
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" required value="{{ old('grade') }}">
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
</div>
@endsection
