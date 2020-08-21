<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\StoreStudentRequest;
use App\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('student.create',compact('courses'));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());
        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('student.edit', compact('student'), compact('courses'));

    }

    public function update(StoreStudentRequest $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return back();
    }
}
