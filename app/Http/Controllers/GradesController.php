<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index() {
        return view('grade.index',
        [
            'title' => 'grade',
            'active' => 'grade',
            "grades" => Grade::all()
        ]
    );}

    public function create() {
        return view('grade.create', [
            "title" => "Add New Grade",
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            "grade" => "required"
        ]);

        $result = Grade::create($validateData);
        if($result) {
            return redirect('/dashboard/grade')->with('success', 'New grade data has been added!');
        }
    }

    public function destroy(Grade $grade) {
        $result = Grade::destroy($grade->id);   
        if($result) {
            return redirect('/dashboard/grade')->with('success', 'Grade data has been deleted!');
        } else {
            return redirect('/dashboard/grade')->with('error', 'Grade data failed to delete!');
        }
    }

    public function edit(Grade $grade) {
        return view('grade.edit', [
            'grade' => $grade,
            "title" => "Edit Grade",
        ]);
    }

    public function update(Request $request, Grade $grade) {
        $request->validate([
            "grade" => "required",
        ]);

        $grade->update([
            "grade" => $request->grade,
        ]);

        return redirect('/dashboard/grade')->with('success', 'Grade data has been updated!');
    }
}
