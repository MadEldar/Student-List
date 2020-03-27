<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function studentList() {
        $students = Student::all();
        return view('student-list', [
            'title' => 'Student list',
            'students' => $students
        ]);
    }

    public function studentCreate(Request $req) {
        $req->validate([
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'telephone' => 'required',
        ]);
        Student::create([
            'name' => $req->get('name'),
            'age' => $req->get('age'),
            'address' => $req->get('address'),
            'telephone' => $req->get('telephone'),
        ]);
        $students = Student::all();
        return view('student-list', [
            'title' => 'Student list',
            'students' => $students
        ]);
    }

    public function studentEdit(Request $req) {
        $req->validate([
            'id' => 'required|exists:students',
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'telephone' => 'required',
        ]);
        Student::find($req->get('id'))->update([
            'name' => $req->get('name'),
            'age' => $req->get('age'),
            'address' => $req->get('address'),
            'telephone' => $req->get('telephone'),
        ]);
        $students = Student::all();
        return view('student-list', [
            'title' => 'Student list',
            'students' => $students
        ]);
    }

    public function studentDelete(Request $req) {
        $req->validate([
            'id' => 'required|exists:students'
        ]);
        Student::find($req->get('id'))->delete();
        $students = Student::all();
        return view('student-list', [
            'title' => 'Student list',
            'students' => $students
        ]);
    }
}
