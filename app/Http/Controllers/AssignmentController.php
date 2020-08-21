<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentFile;
use App\Course;
use App\Http\Requests\StoreAssignmentRequest;
use App\Student;
use Illuminate\Support\Facades\File;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $assignments = Assignment::all();
        return view('assignment.index', compact('assignments'));
    }

    public function create()
    {
        $courses = Course::all();
        $students = Student::all();
        return view('assignment.create',compact('courses','students'));
    }

    public function store(StoreAssignmentRequest $request)
    {

        $assignment = Assignment::create($request->all());
        if ($request->hasFile('assignmentFiles')){
            foreach($request->assignmentFiles as $file){
                $assignment_file = new AssignmentFile();
                $uploaded = $file->store('upload/assignment_files','public');
                $assignment_file->file_name = $file->getClientOriginalName();
                $assignment_file->assignment = $assignment->id;
                $assignment_file->file = $uploaded;
                $assignment_file->save();
            }
        }
        return redirect()->route('assignments.index');
    }

    public function show(Assignment $assignment)
    {
        return view('assignment.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        $students = Student::all();
        $courses = Course::all();
        return view('assignment.edit', compact('assignment','courses','students'));

    }

    public function update(StoreAssignmentRequest $request, Assignment $assignment)
    {
        if ($request->hasFile('assignmentFiles')){
            foreach($request->assignmentFiles as $file){
                $assignment_file = new AssignmentFile();
                $uploaded = $file->store('upload/assignment_files','public');
                $assignment_file->file_name = $file->getClientOriginalName();
                $assignment_file->assignment = $assignment->id;
                $assignment_file->file = $uploaded;
                $assignment_file->save();
            }
        }
        $assignment->update($request->all());
        return redirect()->route('assignments.index');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return back();
    }
    public function destroyAssignmentFile(AssignmentFile $assignment_file){
        // delete file from storage
        $image_path = 'storage/'.$assignment_file->file;
        if (file_exists($image_path)) {
            File::delete($image_path);
        }
        //delete data
        $assignment_file->delete();
        return response('');
    }
}
