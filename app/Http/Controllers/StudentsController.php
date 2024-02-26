<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {
        $students = Student::latest();

        if (request()->has('search')) {
            $students->filter(request(['search']));
        }

        return view('student.all', [
            "title" => "Students",
            'students' => $students->get()
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
            "grades" => Grade::all()
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            "nis" => "required",
            "nama" => "required",
            "tanggal_lahir" => "required|date",
            "grades_id" => "required",
            "alamat" => "required"
        ]);

        $result = Student::create($validateData);
        if($result) {
            return redirect('/dasboard/student')->with('success', 'New student data has been added!');
        }
    }

    public function destroy($student) {
        $result = Student::destroy($student);   
        if($result) {
            return redirect('/dashboard/student')->with('success', 'Student data has been deleted!');
        } else {
            return redirect('/dashboard/student')->with('error', 'Student data failed to delete!');
        }
    }

    public function edit($student) {
        return view('student.edit', [
            "title" => "Edit Student Data",
            "student" => Student::find($student),
            "grades" => Grade::all()
        ]);
    }

    public function update(Request $request, Student $student) {
        $request->validate([
            "nis" => "required",
            "nama" => "required",
            "tanggal_lahir" => "required|date",
            "grades_id" => "required",
            "alamat" => "required"
        ]);

        Student::where('id', $student->id)->update([
            "nis" => $request->nis,
            "nama" => $request->nama,
            "tanggal_lahir" => $request->tanggal_lahir,
            "grades_id" => $request->grades_id,
            "alamat" => $request->alamat
        ]);

        return redirect('/dashboard/student')->with('success', 'Student data has been updated!');
    }
}
