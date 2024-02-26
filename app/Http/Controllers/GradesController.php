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
    );
    }
}
