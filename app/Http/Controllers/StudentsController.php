<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {
        return view('student.all', [
            "title" => "Students",
            "students" => Student::all()
        ]);
    }

    public function show($student) {
        return view('student.detail', [
            "title" => "Student Details",
            "student" => Student::find($student)
        ]);
    }

    public function create() {
        return view('student.create', [
            "title" => "Add New Student",
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            "nis" => "required",
            "nama" => "required",
            "tanggal_lahir" => "required|date",
            "kelas" => "required",
            "alamat" => "required"
        ]);

        $result = Student::create($validateData);
        if($result) {
            return redirect('/student/all')->with('success', 'New student data has been added!');
        }
    }
}
