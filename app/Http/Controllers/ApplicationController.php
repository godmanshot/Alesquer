<?php

namespace App\Http\Controllers;

use App\Application;
use App\Course;
use App\Person;
use App\Record;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->repository = new Application();
        $this->view_path = 'applications';
        $this->route = 'application';
    }

    public function record(Record $record)
    {

        $persons = Person::all();
        $courses = Course::all();
        return view('applications.create', compact('record', 'persons', 'courses'));
    }

    public function store(Request $request)
    {
        $data = [];

        $data['course_id'] = $request->input('course_id');
        $data['person_id'] = $request->input('person_id');
        $data['teacher_id'] = Teacher::where('user_id', Auth::id())->first()->id;

        $model = $this->repository->create($data);

        Record::where('id', $request->input('record_id'))->delete();

        return redirect()->route('home');
    }

    public function destroy(Application $application)
    {
        $model = $application;

        $model->delete();
        
        return redirect()->route('home');
    }
}
